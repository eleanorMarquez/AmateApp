<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Question;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QuestionController extends Controller
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
        return view('admin.questions.index');
    }

    public function getQuestions()
    {
        $data = array();
        $news = Question::where('deleted_up', null)->get();
        foreach ($news as $key => $value) {

            $ruta_editar = route('questions.edit', $value->id);

            $info = [
                $value->id,
                Str::limit($value->ask, 50, '...'),
                $value->category,
                date("Y-m-d H:m", strtotime($value->created_at)),
                '
                <a href="' . $ruta_editar . '" class="btn btn-xs btn-success" ><i class="mdi mdi-border-color"></i>Editar</a>
                <button type="button" class="btn btn-xs btn-danger" onclick="eliminarPregunta(' . $value->id . ');"><i class="mdi mdi-delete-forever"></i>Eliminar</button>
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
        //
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

        if ($request->hasFile('audio')) {
            //agrego nuevo audio
            $audio = $request->file('audio')->store('public/audios');
            $url = Storage::url($audio);
        }

        if ($request->hasFile('imgLogo')) {
            //agrego la nueva imagen
            $image = $request->file('imgLogo')->store('public/imagenespreguntas');
            $url_ima = Storage::url($image);
        }
        $array = array(
            'ask' => $request->ask,
            'category' => $request->category,
        );
        if (!empty($audio)) {
            $array['audio'] = $url;
        }

        if (!empty($image)) {
            $array['image'] = $url_ima;
        }

        if ($new_add = Question::create($array)) {
            $error = false;
            $mensaje = 'Registro Exitoso!';
        } else {
            $error = true;
            $mensaje = 'Error! Se presento un problema al registra la pregunta, intenta de nuevo';
        }

        echo json_encode(array('error' => $error, 'mensaje' => $mensaje));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pregunt = Question::find($id);
        return view('admin.questions.edit', compact('pregunt'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $error = false;
        $mensaje = '';

        if ($request->hasFile('audio')) {
            // busco el audio anterior y la elimino
            $url_anterior = str_replace('storage', 'public', $question->audio);
            Storage::delete($url_anterior);

            //agrego la nueva imagen
            $audio = $request->file('audio')->store('public/audios');
            $url = Storage::url($audio);
        }
        if ($request->hasFile('imgLogo')) {
            // busco el audio anterior y la elimino
            $url_anterior_ima = str_replace('storage', 'public', $question->image);
            Storage::delete($url_anterior_ima);

            //agrego la nueva imagen
            $image = $request->file('imgLogo')->store('public/imagenespreguntas');
            $url_ima = Storage::url($image);
        }

        $array = array(
            'ask' => $request->ask,
            'category' => $request->category,
        );

        if (!empty($audio)) {
            $array['audio'] = $url;
        }
        if (!empty($image)) {
            $array['image'] = $url_ima;
        }

        if ($new_add = Question::findOrFail($request->id)->update($array)) {
            $error = false;
            $mensaje = 'Registro Exitoso!';
        } else {
            $error = true;
            $mensaje = 'Error! Se presento un problema al registra la pregunta, intenta de nuevo';
        }

        echo json_encode(array('error' => $error, 'mensaje' => $mensaje));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $error = false;
        $mensaje = '';

        $array = array(
            'deleted_up' =>  Carbon::now()->format('Y-m-d'),
        );

        if (Question::findOrFail($id)->update($array)) {

            $error = false;
            $mensaje = 'Pregunta Eliminada!';
        } else {
            $error = true;
            $mensaje = 'Error! Se presentó un problema, intenta de nuevo';
        }
        echo json_encode(array('error' => $error, 'mensaje' => $mensaje));
    }
}
