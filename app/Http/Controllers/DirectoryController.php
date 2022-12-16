<?php

namespace App\Http\Controllers;

use App\Models\Directory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DirectoryController extends Controller
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
        return view('admin.directory.index');
    }

    public function getDirectory()
    {
        $data = array();
        $news = Directory::get();
        foreach ($news as $key => $value) {

            $ruta_editar = route('directorio.edit', $value->id);

            $info = [
                '<img src="' . $value->image . '" alt="image"/>',
                $value->entity,
                $value->area_of_contact,
                $value->phones,
                date("Y-m-d H:m", strtotime($value->created_at)),
                '
                <a href="' . $ruta_editar . '" class="btn btn-xs btn-success"><i class="mdi mdi-border-color"></i> Editar</a>
                <button type="button" class="btn btn-xs btn-danger" onclick="eliminarDirectory(' . $value->id . ');"><i class="mdi mdi-delete-forevermdi mdi-delete-forever"></i>Eliminar</button>
                '
            ];

            $data[] = $info;
        }

        echo json_encode([
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.directory.create');
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

        # validamos si existe la imagen en el request
        $image = $request->file('imgLogo')->store('public/imagenesentidades');
        $url = Storage::url($image);

        $array = array(
            'entity' =>  $request->entity,
            'image' => $url,
            'area_of_contact' => $request->area_of_contact,
            'phones' => $request->phones,
            'ubication' => $request->ubication,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
        );

        if ($new_add = Directory::create($array)) {
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
     * @param  \App\Models\Directory  $directory
     * @return \Illuminate\Http\Response
     */
    public function show(Directory $directory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Directory  $directory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $directory = Directory::find($id);

        return view('admin.directory.edit', compact('directory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Directory  $directory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Directory $directory)
    {
        $error = false;
        $mensaje = '';

        # validamos si existe la imagen en el request
        if ($request->hasFile('imgLogo')) {
            // busco la imagen anterior y la elimino
            $url_anterior = str_replace('storage', 'public', $directory->image);
            Storage::delete($url_anterior);

            //agrego la nueva imagen
            $image = $request->file('imgLogo')->store('public/imagenesentidades');
            $url = Storage::url($image);
        }

        $array = array(
            'entity' =>  $request->entity,
            'area_of_contact' => $request->area_of_contact,
            'phones' => $request->phones,
            'ubication' => $request->ubication,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
        );

        if (!empty($image)) {
            $array['image'] = $url;
        }

        if ($new_add = Directory::findOrFail($request->id)->update($array)) {
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
     * @param  \App\Models\Directory  $directory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $error = false;
        $mensaje = '';

        if (Directory::findOrFail($id)->delete()) {
            $error = false;
        } else {
            $error = true;
            $mensaje = 'Error! Se presento un problema al eliminar, intenta de nuevo.';
        }

        echo json_encode(array('error' => $error, 'mensaje' => $mensaje));
    }
}
