<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\User;
use App\Models\Event;
use App\Models\Question;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $id_user = Auth::user()->id;
        $user = User::find($id_user);

        //consultas de logueados
        $tota_urgente = DB::table('test_realizados')
            ->select(DB::raw('count(answer) as total'))
            ->where('answer', 'urgente')
            ->where('type_test', 'Logueado')
            ->get();

        $tota_reacciona = DB::table('test_realizados')
            ->select(DB::raw('count(answer) as total'))
            ->where('answer', 'reacciona')
            ->where('type_test', 'Logueado')
            ->get();

        $tota_alerta = DB::table('test_realizados')
            ->select(DB::raw('count(answer) as total'))
            ->where('answer', 'alerta')
            ->where('type_test', 'Logueado')
            ->get();

        $coun_urgente = $tota_urgente[0]->total == null ? 0 : $tota_urgente[0]->total;
        $coun_reacciona = $tota_reacciona[0]->total == null ? 0 : $tota_reacciona[0]->total;
        $coun_alerta = $tota_alerta[0]->total == null ? 0 : $tota_alerta[0]->total;

        $dtos = array(
            'Urgente' => $coun_urgente,
            'Reacciona' => $coun_reacciona,
            'Alerta' => $coun_alerta,
        );

        //consultas de anonimos
        $tota_urgente_anonimo = DB::table('test_realizados')
            ->select(DB::raw('count(answer) as total'))
            ->where('answer', 'urgente')
            ->where('type_test', 'Anonimo')
            ->get();

        $tota_reacciona_anonimo = DB::table('test_realizados')
            ->select(DB::raw('count(answer) as total'))
            ->where('answer', 'reacciona')
            ->where('type_test', 'Anonimo')
            ->get();

        $tota_alerta_anonimo = DB::table('test_realizados')
            ->select(DB::raw('count(answer) as total'))
            ->where('answer', 'alerta')
            ->where('type_test', 'Anonimo')
            ->get();

        $coun_urgente_anonimo = $tota_urgente_anonimo[0]->total == null ? 0 : $tota_urgente_anonimo[0]->total;
        $coun_reacciona_anonimo = $tota_reacciona_anonimo[0]->total == null ? 0 : $tota_reacciona_anonimo[0]->total;
        $coun_alerta_anonimo = $tota_alerta_anonimo[0]->total == null ? 0 : $tota_alerta_anonimo[0]->total;

        $dtos_anonimo = array(
            'Urgente' => $coun_urgente_anonimo,
            'Reacciona' => $coun_reacciona_anonimo,
            'Alerta' => $coun_alerta_anonimo,
        );
        if ($user->hasRole('Juidico') || $user->hasRole('Psicologo')) {
            $count_events = Event::where('id_author', $id_user)->count();
            $count_noticias = Information::where('id_author', $id_user)->count();

            return view('admin.home', compact('count_events', 'count_noticias', 'dtos', 'dtos_anonimo'));
        } else if ($user->hasRole('Usuario')) {
            return view('admin.home');
        } else {
            $count_profesionales = User::with('roles')->whereDoesntHave('roles', function ($query) {
                $query->whereIn('name', ['Admin', 'Usuario']);
            })->count();
            $count_usuarios = User::with('roles')->whereDoesntHave('roles', function ($query) {
                $query->whereIn('name', ['Admin', 'Juidico', 'Psicologo']);
            })->count();
            $count_events = Event::count();
            $count_noticias = Information::count();
            return view('admin.home', compact('count_profesionales', 'count_usuarios', 'count_events', 'count_noticias', 'dtos', 'dtos_anonimo'));
        }
    }
}
