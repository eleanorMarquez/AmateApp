<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Question;
use App\Models\TestAnonimo;
use Illuminate\Http\Request;
use App\Models\TestRealizados;
use Barryvdh\DomPDF\Facade\Pdf;
use Symfony\Component\HttpFoundation\Session\Session;

class TestAnonimoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //dd($request->all());

        $caracteres_permitidos = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $longitud = 12;
        $author_ramdon = substr(str_shuffle($caracteres_permitidos), 0, $longitud);

        $id_ask = $request->id_ask;
        $var = 'optionsRadios';
        for ($i = 0; $i < sizeof($id_ask); ++$i) {
            $obj = $i + 1;
            $name = $var . $obj;
            // if (isset($request->$name)) {
            $register_test = TestAnonimo::updateOrCreate(
                [
                    'author_random'  => $author_ramdon,
                    'id_ask' => $id_ask[$i],
                ],
                [

                    'answer'  => $request->$name,
                ],
            );
            // }
        }
        if ($register_test->save() || count($register_test->changes)) {
            //session()->flash('author_ramdon', $uthor_rndom);
            session()->flash('success', "Se ha registrado exitosamente el Test");
            return redirect()->route('test_anonimo.resultado', $author_ramdon);
        } else {
            session()->flash('error', "Ha ocurrido un error al registrar el Test");
            return redirect()->route('test_anonimo.index');
        }
    }

    public function resultado($author_ramdon)
    {
        //$author_ramdon = Session::get('author_ramdon');

        $validate = TestAnonimo::where('author_random', $author_ramdon)->exists();
        $answertests = TestAnonimo::where('author_random', $author_ramdon)->get();

        $totalquestio_alerta = Question::where('category', 'alerta')->count();
        $totalquestio_urgente = Question::where('category', 'urgente')->count();
        $totalquestio_reacciona = Question::where('category', 'reacciona')->count();

        $dato = 0;
        $repuesta = '';
        if ($validate) {
            $dato = 1;
            $count_alerta = 0;
            $count_urgente = 0;
            $count_reacciona = 0;
            foreach ($answertests as $key => $value) {
                $id_ask = $value->id_ask;
                $answer = $value->answer;

                $category = $value->find($value->id)->questionsda->category;

                if ($category == 'alerta' && $answer == 1) {
                    $count_alerta = $count_alerta + 1;
                } else if ($category == 'urgente' && $answer == 1) {
                    $count_urgente = $count_urgente + 1;
                } else if ($category == 'reacciona' && $answer == 1) {
                    $count_reacciona = $count_reacciona + 1;
                }
            }

            if ($count_alerta > $count_urgente && $count_alerta > $count_reacciona && $totalquestio_urgente > $count_urgente) {
                $repuesta = 'alerta';
            } else if ($count_reacciona > $count_urgente && $count_reacciona > $count_alerta && $totalquestio_urgente > $count_urgente) {
                $repuesta = 'reacciona';
            } else if ($count_urgente > $count_reacciona && $count_urgente > $count_alerta && $totalquestio_urgente == $count_urgente) {
                $repuesta = 'urgente';
            } else if ($count_urgente <= $count_reacciona && $count_urgente <= $count_alerta && $totalquestio_urgente == $count_urgente) {
                $repuesta = 'urgente';
            } else {
                $repuesta = 'ninguno';
            }
            $register_test = TestRealizados::updateOrCreate(
                [
                    'author_ramdon'  => $author_ramdon,
                ],
                [
                    'answer'  => $repuesta,
                    'type_test'  => 'Anonimo',
                ],
            );
            //dd($count_alerta, $count_urgente, $count_reacciona);
        } else {
            $dato = 0;
        }

        return view('frontend.anonimo.resultes', compact('dato', 'repuesta'));
    }

    public function detalles($author_ramdon)
    {
        $validate = TestAnonimo::where('author_random', $author_ramdon)->count();
        if ($validate > 0) {
            $test = TestAnonimo::where('author_random', $author_ramdon)->get();
            $test_result = TestRealizados::where('author_ramdon', $author_ramdon)->first();
            //dd($test);
            return view('clients.test.showanonimo', compact('test', 'test_result', 'author_ramdon'));
        } else {
            return view('clients.test.showanonimo', compact('author_ramdon'));
        }
    }

    public function downloadpdf($author_ramdon)
    {
        $testuser = TestAnonimo::where('author_random', $author_ramdon)->get();
        $user = $author_ramdon;
        //dd($testuser);
        //view()->share('clients.test.pdf', [$testuser, $user]);
        $data = compact('testuser', 'user');
        $pdf = PDF::loadView('clients.test.pdfanonimo', $data);

        return $pdf->download('Test de ' . $author_ramdon . '.pdf');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TestAnonimo  $testAnonimo
     * @return \Illuminate\Http\Response
     */
    public function show(TestAnonimo $testAnonimo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TestAnonimo  $testAnonimo
     * @return \Illuminate\Http\Response
     */
    public function edit(TestAnonimo $testAnonimo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TestAnonimo  $testAnonimo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TestAnonimo $testAnonimo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TestAnonimo  $testAnonimo
     * @return \Illuminate\Http\Response
     */
    public function destroy(TestAnonimo $testAnonimo)
    {
        //
    }
}
