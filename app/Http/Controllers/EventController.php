<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.events.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.events.create');
    }

    public function getEvents()
    {
        $userauth = Auth::user()->id;
        $user = User::find($userauth);

        $news = '';
        if ($user->hasrole('Admin')) {
            $news = Event::all();
        } else {
            $news = Event::where('id_author', $userauth)->get();
        }

        $data = array();

        foreach ($news as $key => $value) {

            $ruta_editar = route('evento.edit', $value->id);

            $info = [
                $value->id,
                $value->title,
                $value->find($value->id)->datauser->name,
                date("Y-m-d H:m", strtotime($value->date)),
                date("Y-m-d H:m", strtotime($value->created_at)),
                '
                <a href="' . $ruta_editar . '" class="btn btn-xs btn-success"><i class="mdi mdi-border-color"></i> Editar</a>
                <button type="button" class="btn btn-xs btn-danger" onclick="eliminarEvento(' . $value->id . ');"><i class="mdi mdi-delete-forever"></i>Eliminar</button>
                '
            ];

            $data[] = $info;
        }

        echo json_encode([
            'data' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $error = false;
        $mensaje = '';

        $user_login = Auth::user()->id;

        # validamos si existe la imagen en el request
        $image = $request->file('imgLogo')->store('public/imageneseventos');
        $url = Storage::url($image);

        $array = array(
            'title' => $request->title,
            'description' => $request->description,
            'image' => $url,
            'ubication' => $request->ubication,
            'date' => $request->date,
            'hour' => $request->hour,
            'id_author' => $user_login,
        );

        if ($new_add = Event::create($array)) {
            $error = false;
            $mensaje = 'Registro Exitoso!';
        } else {
            $error = true;
            $mensaje = 'Error! Se presento un problema al registra el evento, intenta de nuevo';
        }

        echo json_encode(array('error' => $error, 'mensaje' => $mensaje));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evento = Event::find($id);

        return view('admin.events.edit', compact('evento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $error = false;
        $mensaje = '';

        $user_login = Auth::user()->id;

        # validamos si existe la imagen en el request
        if ($request->hasFile('imgLogo')) {
            // busco la imagen anterior y la elimino
            $url_anterior = str_replace('storage', 'public', $event->image);
            Storage::delete($url_anterior);

            //agrego la nueva imagen
            $image = $request->file('imgLogo')->store('public/imageneseventos');
            $url = Storage::url($image);
        }

        $array = array(
            'title' => $request->title,
            'description' => $request->description,
            'ubication' => $request->ubication,
            'date' => $request->date,
            'hour' => $request->hour,
            'id_author' => $user_login,
        );

        if (!empty($image)) {
            $array['image'] = $url;
        }

        if ($new_add = Event::findOrFail($request->id)->update($array)) {
            $error = false;
            $mensaje = 'Actualización Exitosa!';
        } else {
            $error = true;
            $mensaje = 'Error! Se presento un problema al actualizar la información, intenta de nuevo';
        }

        echo json_encode(array('error' => $error, 'mensaje' => $mensaje));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $error = false;
        $mensaje = '';

        if (Event::findOrFail($id)->delete()) {
            $error = false;
        } else {
            $error = true;
            $mensaje = 'Error! Se presento un problema al eliminar, intenta de nuevo.';
        }

        echo json_encode(array('error' => $error, 'mensaje' => $mensaje));
    }
}
