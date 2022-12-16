<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Question;
use App\Models\Directory;
use App\Models\Information;
use Illuminate\Http\Request;

class FrontendController extends Controller
{

    public function inicio()
    {
        $noticias = Information::latest()->take(8)->get();
        $noticias_count = Information::count();
        $eventos = Event::latest()->take(8)->get();
        $eventos_count = Event::count();

        return view('frontend.inicio', compact('noticias', 'noticias_count', 'eventos', 'eventos_count'));
    }

    public function directorio()
    {
        $directorios = Directory::all();
        $directorios_count = Directory::count();
        return view('frontend.directorio', compact('directorios', 'directorios_count'));
    }

    public function noticias()
    {
        $noticias = Information::all();
        $noticias_count = Information::count();
        return view('frontend.noticias.noticias', compact('noticias', 'noticias_count'));
    }

    public function noticiashow($id)
    {
        $lastestnoticia = Information::latest()
            ->take(4)
            ->get();
        $noticia = Information::find($id);
        return view('frontend.noticias.show', compact('noticia', 'lastestnoticia'));
    }

    public function eventos()
    {
        $eventos = Event::all();
        $eventos_count = Event::count();
        return view('frontend.eventos.index', compact('eventos', 'eventos_count'));
    }

    public function eventoshow($id)
    {
        $lastesteven = Event::latest()
            ->take(4)
            ->get();
        $evento = Event::find($id);
        return view('frontend.eventos.show', compact('evento', 'lastesteven'));
    }

    public function contacto()
    {
        return view('frontend.contacto');
    }

    public function contacto_store(Request $request)
    {
        $error = false;
        $mensaje = '';

        $name = $request->name;
        $email = $request->email;
        $phone = $request->phonenumber;
        $asuno = $request->subject;
        $mensaje = $request->message;


        if ($request->all()) {
            $error = false;
            $this->enviarCorreoContacto($name, $email, $phone, $asuno, $mensaje);
        } else {
            $error = true;
            $mensaje = 'Error! Se presento un problema al eliminar, intenta de nuevo.';
        }

        echo json_encode(array('error' => $error, 'mensaje' => $mensaje));
    }

    public function test_anonimo()
    {
        $quesions = Question::where('deleted_up', null)->get();
        return view('frontend.anonimo.testanonimo', compact('quesions'));
    }
}
