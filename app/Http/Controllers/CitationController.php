<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Citation;
use App\Models\ReservarCita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CitationController extends Controller
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
        return view('admin.citation.index');
    }

    public function agendadas()
    {
        return view('admin.citation.agendadas');
    }

    public function agendadaslistado()
    {
        $user_login = Auth::user()->id;
        $now = Carbon::now('America/Bogota')->format('Y-m-d');
        $data = array();
        $data2 = array();
        $data2['reservas'] = ReservarCita::all();
        $data2['citas'] = Citation::where('id_profesional', $user_login)->get();
        /* $citasagendadas = ReservarCita::whereHas('citacioness', function ($query) use ($user_login) {
            $query->where('id_profesional', $user_login)->where('status', 1);
        })->get(); */

        foreach ($data2['reservas'] as $key => $value2) {
            $info = [];
            $button = '';
            foreach ($data2['citas'] as $key => $value) {
                if ($now > $value->date_cita) {
                    $button = '<button type="button" class="btn btn-xs btn-danger" style="cursor: default;" disabled><i class="mdi mdi-delete-forevermdi mdi-delete-forever"></i>Cancelar Cita</button>';
                } else {
                    $button = '
                    <button type="button" class="btn btn-xs btn-danger" onclick="cancelaCita(' . $value->id . ');"><i class="mdi mdi-delete-forevermdi mdi-delete-forever"></i>Cancelar Cita</button>
                    ';
                }

                $info = [
                    $value2->id,
                    $value->date_cita,
                    $value2->find($value2->id)->usuariodata->name,
                    $button
                ];
            }
            $data[] = $info;
        }

        echo json_encode([
            'data' => $data
        ]);
    }

    public function listcitations()
    {
        $iduser = Auth::user()->id;
        $list_cittions = Citation::where('id_profesional', $iduser)->get();

        $new_agenda = [];

        foreach ($list_cittions as $key => $value) {
            $new_agenda[] = [
                "id" => $value->id,
                "start" => $value->date_cita . " " . $value->time_start,
                "end" => $value->date_cita . " " . $value->time_end,
                "title" => $value->find($value->id)->usuariodata->name . " " . $value->desciption,
                "backgroundColor" => $value->status == 1 ? "#1f7904" : "#7b0205",
                "extendedProps" => "#fff",
                "extendsProps" => [
                    "id_profesional" => $value->id_profesional
                ]

            ];
        }
        return response()->json($new_agenda);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function validarFecha($fecha, $hora_inicial, $hora_final)
    {
        $search_cita = Citation::whereDate('date_cita', $fecha)
            ->whereBetween('time_start', [$hora_inicial, $hora_final])
            ->orWhereBetween('time_start', [$hora_inicial, $hora_final])
            ->first();

        return $search_cita == null ? true : false;
    }

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
        $id_user = Auth::user()->id;
        $inputs = $request->all();
        //dd($request->all());
        if ($this->validarFecha($inputs["date_cita"], $inputs["time_start"], $inputs["time_end"])) {
            $save_cita = Citation::create([
                'id_profesional' => $id_user,
                'date_cita' => $inputs["date_cita"],
                'time_start' => $inputs["time_start"],
                'time_end' => $inputs["time_end"],
                'desciption' => $inputs["desciption"],
                'type_cita' => isset($inputs["type_cita"]),
                'link_cita' => $inputs["link_cita"],
            ]);

            return response()->json(["ok" => true]);
        } else {
            return response()->json(["ok" => true]);
        }
    }

    public function agendar()
    {
        $horaFormateada = now()->isoFormat('H:mm:ss');
        $hoy = Carbon::today();
        $agenda = Citation::whereDate('date_cita', '>=', $hoy)
            ->where('status', 1)->get();
        return view('admin.agendar_cita.index', compact('agenda'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Citation  $citation
     * @return \Illuminate\Http\Response
     */
    public function show(Citation $citation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Citation  $citation
     * @return \Illuminate\Http\Response
     */
    public function edit(Citation $citation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Citation  $citation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Citation $citation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Citation  $citation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $error = false;
        $mensaje = '';
        $citareservada = ReservarCita::where('id_citation', $id)->first();

        if ($citareservada != null) {
            $idcita_reservada = $citareservada->id;
            if (ReservarCita::findOrFail($idcita_reservada)->delete()) {
                if (Citation::findOrFail($id)->delete()) {
                    $error = false;
                } else {
                    $error = true;
                    $mensaje = 'Error! Se presento un problema al eliminar, intenta de nuevo.';
                }
            } else {
                $error = true;
                $mensaje = 'Error! Se presento un problema al eliminar, intenta de nuevo.';
            }
        } else {
            if (Citation::findOrFail($id)->delete()) {
                $error = false;
            } else {
                $error = true;
                $mensaje = 'Error! Se presento un problema al eliminar, intenta de nuevo.';
            }
        }
        echo json_encode(array('error' => $error, 'mensaje' => $mensaje));
    }
}
