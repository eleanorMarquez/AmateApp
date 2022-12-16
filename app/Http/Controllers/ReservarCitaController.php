<?php

namespace App\Http\Controllers;

use App\Models\Citation;
use App\Models\ReservarCita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservarCitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.agendar_cita.miscitas');
    }

    public function miscitas()
    {
        $user_login = Auth::user()->id;
        $data = array();
        $citasagendadas = Citation::whereHas('citas', function ($query) use ($user_login) {
            $query->where('id_user', $user_login)->where('status', 1);
        })->get();

        foreach ($citasagendadas as $key => $value) {
            $info = [
                $value->id,
                $this->fechaCastellano($value->date_cita),
                $value->time_start,
                $value->desciption,
                '
                <button type="button" class="btn btn-xs btn-danger" onclick="cancelaCita(' . $value->id . ');"><i class="mdi mdi-delete-forevermdi mdi-delete-forever"></i>Cancelar Cita</button>
                '
            ];

            $data[] = $info;
        }

        echo json_encode([
            'data' => $data
        ]);
    }

    function fechaCastellano($fecha)
    {
        $fecha = substr($fecha, 0, 10);
        $numeroDia = date('d', strtotime($fecha));
        $dia = date('l', strtotime($fecha));
        $mes = date('F', strtotime($fecha));
        $anio = date('Y', strtotime($fecha));
        $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
        $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
        $nombredia = str_replace($dias_EN, $dias_ES, $dia);
        $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
        return $nombredia . " " . $numeroDia . " de " . $nombreMes . " de " . $anio;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function agendar($id)
    {
        $error = false;
        $mensaje = '';

        $user_login = Auth::user()->id;

        $array = array(
            'status' =>  0,
        );

        if ($new_add = Citation::findOrFail($id)->update($array)) {
            $add_agendamiento = array(
                'id_citation' =>  $id,
                'id_user' =>  $user_login,
            );

            if (ReservarCita::create($add_agendamiento)) {
                $error = false;
                $mensaje = 'Registro Exitoso!';
            } else {
                $error = true;
                $mensaje = 'Error! Se presento un problema al registra el evento, intenta de nuevo';
            }
        } else {
            $error = true;
            $mensaje = 'Error! Se presento un problema al registra la información, intenta de nuevo';
        }

        echo json_encode(array('error' => $error, 'mensaje' => $mensaje));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReservarCita  $reservarCita
     * @return \Illuminate\Http\Response
     */
    public function show(ReservarCita $reservarCita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReservarCita  $reservarCita
     * @return \Illuminate\Http\Response
     */
    public function edit(ReservarCita $reservarCita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReservarCita  $reservarCita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReservarCita $reservarCita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReservarCita  $reservarCita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $error = false;
        $mensaje = '';

        $micita = ReservarCita::where('id_citation', $id)->first();
        $idmicita = $micita->id;
        $array = array(
            'status' =>  1,
        );
        if (ReservarCita::findOrFail($idmicita)->delete()) {
            if (Citation::findOrFail($id)->update($array)) {

                $error = false;
                $mensaje = 'Cita Cancelada!';
            } else {
                $error = true;
                $mensaje = 'Error! Se presento un problema al registra la información, intenta de nuevo';
            }
        } else {
            $error = true;
            $mensaje = 'Error! Se presento un problema al eliminar, intenta de nuevo.';
        }
        echo json_encode(array('error' => $error, 'mensaje' => $mensaje));
    }
}
