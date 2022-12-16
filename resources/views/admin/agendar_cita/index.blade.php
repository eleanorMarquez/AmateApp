@php
    function fechaCastellano ($fecha) {
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
        return $nombredia." ".$numeroDia." de ".$nombreMes." de ".$anio;
    }
@endphp
<x-main-layout>
    <!-- title -->
    @section('title')Agendar Cita @endsection

     <!---- CSS ----->
    <x-slot name="css">
    </x-slot>    
    <div class="main-panel"> 
        <div class="content-wrapper">
        <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                        <div class="row mb-2">
                          <div class="col-sm-6">
                           <h3 class="card-title">Agendar Cita</h3>
                          </div>
                          <div class="col-sm-6">
                          </div>
                        </div>
                  <p class="card-description">
                    Mira las citas disponibles por los profesionales y agenda tu cita.
                  </p>

                  <div class="row">
                    @if (count($agenda) > 0)
                        @foreach ($agenda as $item)
                            <div class="col-md-6 col-xl-3 mb-5">
                                <div class="team1__item text-center mb-30">
                                    <div class="team1__thumb">
                                        <img src="{{ asset('images/calendar.png')}}" alt="Team">
                                    </div>
                                    <div class="team1__content">
                                        <h4 class="text-white">{{fechaCastellano($item->date_cita)}}</h4>
                                        <p class="fs-5"><span class="fw-bold">Hora de Cita:</span> {{$item->time_start}}</p>
                                        <p class="fs-5"><span class="fw-bold">Profesional:</span> <span class="text-capitalize">{{$item->find($item->id)->usuariodata->name}}</span></p>
                                        <p class="fs-5"><span class="fw-bold">Tipo de Cita:</span> 
                                            <span class="text-capitalize">
                                                @if ($item->type_cita=="1")
                                                    Virtual
                                                    <p class="fs-5 text-center"><span class="fw-bold">Link de reunión:</span> </p>
                                                    <a href="{{$item->link_cita}}" target="_blank">clic aquí</a>
                                                @else
                                                    Presencial
                                                @endif
                                            </span>
                                        </p>
                                        <div class="team1__btn">
                                            <button  class="btn btn-info" type="button" onclick="agendar({{$item->id}})"><i class="menu-icon mdi mdi-calendar-check"></i>Tomar Cita</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h4 class="text-center mt-3">No hay Citas Disponibles en el momento...</h4>
                    @endif
                    
                  </div>
                </div>
              </div>
          </div>
          </div>
        </div>
        @include('components.footer-admin')
    </div>
        
        <!-- partial -->
    
    
     <!-- |==============================| -->
    <x-slot name="js">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            function agendar(id){
                    Swal.fire({
                        title: 'Confirmar Agendamiento',
                        text: "¿Desea agendar esta cita?",
                        icon: 'warning',
                        showCancelButton: true,
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si, Agendar',
                        cancelButtonText: 'Cancelar',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            var url = "mis-citas/store/"+id;
                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                type: "GET",
                                encoding:"UTF-8",
                                url: url,
                                dataType:'json',
                                beforeSend:function(){
                                    Swal.fire({
                                        text: 'Validando información, espere...',
                                        timer: 3000,
                                        timerProgressBar: true,
                                        didOpen: () => {
                                            Swal.showLoading()
                                        },
                                    });
                                }
                            }).done(function(respuesta){
                                //console.log(respuesta);
                                if (!respuesta.error) {
                                    Swal.fire({
                                        title: 'Cita Agendada Exitosamente!',
                                        icon: 'success',
                                        showConfirmButton: true,
                                        timer: 2000
                                    });
                                    setTimeout(function(){
                                    location.reload();
                                    },2000);
                                } else {
                                    setTimeout(function(){
                                        Swal.fire({
                                            title: respuesta.mensaje,
                                            icon: 'error',
                                            showConfirmButton: true,
                                            timer: 4000
                                        });
                                    },2000);
                                }
                            }).fail(function(resp){
                                console.log(resp);
                            });
                        }
                    });
            }   
        </script>
    </x-slot>
    
</x-main-layout>