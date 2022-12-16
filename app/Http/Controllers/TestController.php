<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\User;
use App\Models\Question;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\TestRealizados;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
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
        return view('clients.test.index');
    }

    public function detalles($id)
    {
        $validate = Test::where('id_author', $id)->count();
        $user = User::find($id);
        if ($validate > 0) {
            $test = Test::where('id_author', $id)->get();
            $test_result = TestRealizados::where('id_author', $id)->first();
            //dd($test);
            return view('clients.test.show', compact('test', 'user', 'test_result'));
        } else {
            return view('clients.test.show', compact('user'));
        }
    }

    public function downloadpdf($id)
    {
        $testuser = Test::where('id_author', $id)->get();
        $user = User::find($id);
        //dd($testuser);
        //view()->share('clients.test.pdf', [$testuser, $user]);
        $data = compact('testuser', 'user');
        $pdf = PDF::loadView('clients.test.pdf', $data);

        return $pdf->download('Test de ' . $user->name . '.pdf');
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

        $user_login = Auth::user()->id;
        $id_ask = $request->id_ask;
        $var = 'optionsRadios';
        for ($i = 0; $i < sizeof($id_ask); ++$i) {
            $obj = $i + 1;
            $name = $var . $obj;
            // if (isset($request->$name)) {
            $register_test = Test::updateOrCreate(
                [
                    'id_author'  => $user_login,
                    'id_ask' => $id_ask[$i],
                ],
                [

                    'answer'  => $request->$name,
                ],
            );
            // }
        }
        if ($register_test->save() || count($register_test->changes)) {
            session()->flash('success', "Se ha registrado exitosamente el Test");
            return redirect()->route('test.resultado');
        } else {
            session()->flash('error', "Ha ocurrido un error al registrar el Test");
            return redirect()->route('test.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function resultado()
    {
        $user_login = Auth::user()->id;
        $validate = Test::where('id_author', $user_login)->exists();
        $answertests = Test::where('id_author', $user_login)->get();

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
                    'id_author'  => $user_login,
                ],
                [
                    'answer'  => $repuesta,
                    'type_test'  => 'Logueado',
                ],
            );
            //dd($count_alerta, $count_urgente, $count_reacciona);
        } else {
            $dato = 0;
        }

        return view('clients.test.resultes', compact('dato', 'repuesta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Test $test)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        //
    }
}
