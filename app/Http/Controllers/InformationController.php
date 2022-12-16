<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class InformationController extends Controller
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
        return view('admin.news.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    public function getNews()
    {
        $userauth = Auth::user()->id;
        $user = User::find($userauth);

        $news = '';
        if ($user->hasrole('Admin')) {
            $news = Information::all();
        } else {
            $news = Information::where('id_author', $userauth)->get();
        }
        $data = array();

        foreach ($news as $key => $value) {

            $ruta_editar = route('noticia.edit', $value->id);

            $info = [
                $value->id,
                $value->title,
                $value->find($value->id)->datauser->name,
                date("Y-m-d H:m", strtotime($value->created_at)),
                '
                <a href="' . $ruta_editar . '" class="btn btn-xs btn-success"><i class="mdi mdi-border-color"></i> Editar</a>
                <button type="button" class="btn btn-xs btn-danger" onclick="eliminarNoticia(' . $value->id . ');"><i class="mdi mdi-delete-forevermdi mdi-delete-forever"></i>Eliminar</button>
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
        $image = $request->file('imgLogo')->store('public/imagenesnoticias');
        $url = Storage::url($image);

        $array = array(
            'title' => $request->title,
            'description' => $request->description,
            'image' => $url,
            'id_author' => $user_login,
        );

        if ($new_add = Information::create($array)) {
            $error = false;
            $mensaje = 'Registro Exitoso!';
        } else {
            $error = true;
            $mensaje = 'Error! Se presento un problema al registra la información, intenta de nuevo';
        }

        echo json_encode(array('error' => $error, 'mensaje' => $mensaje));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function show(Information $information)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $new = Information::find($id);

        return view('admin.news.edit', compact('new'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Information $information)
    {
        $error = false;
        $mensaje = '';

        $user_login = Auth::user()->id;

        # validamos si existe la imagen en el request
        if ($request->hasFile('imgLogo')) {
            // busco la imagen anterior y la elimino
            $url_anterior = str_replace('storage', 'public', $information->image);
            Storage::delete($url_anterior);

            //agrego la nueva imagen
            $image = $request->file('imgLogo')->store('public/imagenesnoticias');
            $url = Storage::url($image);
        }

        $array = array(
            'title' => $request->title,
            'description' => $request->description,
            'id_author' => $user_login,
        );

        if (!empty($image)) {
            $array['image'] = $url;
        }

        if ($new_add = Information::findOrFail($request->id)->update($array)) {
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
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $error = false;
        $mensaje = '';

        if (Information::findOrFail($id)->delete()) {
            $error = false;
        } else {
            $error = true;
            $mensaje = 'Error! Se presento un problema al eliminar, intenta de nuevo.';
        }

        echo json_encode(array('error' => $error, 'mensaje' => $mensaje));
    }
}
