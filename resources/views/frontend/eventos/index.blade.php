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
<x-main-frontend>
    <!-- title -->
    @section('title')Eventos @endsection

    <!---- CSS ----->
    <x-slot name="css">
    </x-slot>

    <main>
        <!-- |==========================================| -->
        <!-- |=====|| Page Title Start ||===============| -->
        <section class="page_title page_title__img-03">
            <div class="page_title__padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="page_title__content">
                                <h1>Nuestros Eventos.</h1>
                                <div class="page_title__bread-crumb">
                                    <ul>
                                        <li><a href="{{route('inicio')}}">Inicio</a></li>
                                        <li><a>Eventos</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- |=====|| Page Title End ||=================| -->
        <!-- |==========================================| -->


        <!-- |==========================================| -->
        <!-- |=====|| Events Start ||===============| -->
        <section class="blog2 other_page">
            <div class="content_box_100">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1">
                            <div class="title2 mb-50 text-center">
                                <h4>Actualización de Eventos</h4>
                                <h2>Conoce todos los Eventos del consultorio jurídico UDES</h2>
                                <p>En la secretaría de la mujer actualizamos toda la información, <br
                                        class="d-none d-md-inline-block"> enterate de todas las estratégias, prevenciones y más.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @if ($eventos_count > 0)
                            @foreach ($eventos as $item)
                                <div class="col-xl-4 col-md-6">
                                    <div class="blog2__item mb-30">
                                        <div class="blog2__thumb">
                                            <img src="{{$item->image}}" alt="Image">
                                            <a href="#">Fecha del Evento: {{fechaCastellano($item->date)}}</a>
                                        </div>
                                        <div class="blog2__content">
                                            <div class="blog2__content--data">
                                                <span><i class="far fa-user"></i> Publicada por: 
                                                    {{$item->find($item->id)->datauser->name}}</span>
                                            </div>
                                            <h3>{{$item->title}}</h3>
                                            <a href="{{route('eventoshow',$item->id)}}" class="btn3"> <span>Leer Más</span> <i
                                                    class="icofont-rounded-double-right"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="row text-center">
                                <p><strong>--- No hay Eventos registrados ---</strong></p>
                            </div>
                        @endif
                        
                        
                    </div>
                </div>
            </div>
        </section>
        <!-- |=====|| Blog End ||=================| -->
        <!-- |==========================================| -->


        <!-- |==========================================| -->
        <!-- |=====|| Client Start ||===============| -->
        <section class="client1">
            <h3 class="hidden">Client Section</h3>
            <div class="content_box_100">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="client1__active owl-carousel">
                                <div class="client1__item d-flex justify-content-center align-items-center">
                                    <div class="client1__thumb">
                                        <a href="#"><img src="{{asset('asset/img/client/udes.png')}}" class="imagen_responsiva_prod" alt="Client"></a>
                                    </div>
                                </div>
                                <div class="client1__item d-flex justify-content-center align-items-center">
                                    <div class="client1__thumb">
                                        <a href="#"><img src="{{asset('asset/img/client/sistemas udes.jpeg')}}" class="imagen_responsiva_prod" alt="Client"></a>
                                    </div>
                                </div>
                                <div class="client1__item d-flex justify-content-center align-items-center">
                                    <div class="client1__thumb">
                                        <a href="#"><img src="{{asset('asset/img/client/consultorio udes.png')}}" class="imagen_responsiva_prod" alt="Client"></a>
                                    </div>
                                </div>
                                <div class="client1__item d-flex justify-content-center align-items-center">
                                    <div class="client1__thumb">
                                        <a href="#"><img src="{{asset('asset/img/client/semanvi.jpeg')}}" class="imagen_responsiva_prod" alt="Client"></a>
                                    </div>
                                </div>
                                <div class="client1__item d-flex justify-content-center align-items-center">
                                    <div class="client1__thumb">
                                        <a href="#"><img src="{{asset('asset/img/client/derecho.png')}}" class="imagen_responsiva_prod" alt="Client"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- |=====|| Client End ||=================| -->
        <!-- |==========================================| -->
    </main>
    
    <x-slot name="js">
    </x-slot>

</x-main-frontend>
