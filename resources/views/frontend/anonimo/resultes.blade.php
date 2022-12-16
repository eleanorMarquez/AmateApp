<x-main-frontend>
    <!-- title -->
    @section('title')Resultados del Test Anónimo @endsection
    <x-slot name="css">
    </x-slot>
  <!-- |==========================================| -->
        <!-- |=====|| Register Start ||===============| -->
        <section class="about3">
            <div class="content_box_100">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1">
                            <div class="title2 mb-60 text-center">
                                <h2>Resultados del Test Anónimo Realizado</h2>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            @if (Session::has('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="fas fa-times"></i> {{ Session::get('error') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            
                            @if (Session::has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="fas fa-times"></i> {{ Session::get('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        </div>
                        

                        <div class="contact_page1__form">
                            <div class="row">
                                <div class="col-sm-12">

                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                </div>
                                <div class="card-body">
                                    <p class="card-text">De acuerdo a las respuestas obtenidas se presenta el resultado del test.</p>
                                    <div class="row">
                                        <div class="col-sm-6 text-center">
                                            <lottie-player src="{{asset('animations/resulttest.json')}}"  background="transparent"  
                                            speed="1"  style="width: 250px; height: 250px; margin: 0 auto;" loop autoplay></lottie-player>
                                        </div>
                                        <div class="col-sm-6">
                                            <h4>Su nivel de violencia se encuentra en:</h4>
                                            @if ($dato = 0)
                                                <p>No has realizado el Test de Violencia, ve a test y conoce tu nivel de violencia.</p>
                                            @else
                                                @if ($repuesta == 'alerta')
                                                    <p class="text-center text-warning font-weight-bold mt-4">ALARMA </p>
                                                    <div class="text-center">
                                                        <img src="{{asset('images/resultadotest/amarillo.png')}}" class="img-fluid" alt="Responsive image">
                                                    </div>
                
                                                @elseif ($repuesta == 'reacciona')
                                                    <p class="text-center text-orange font-weight-bold mt-4" style="color: orange;">REACCIONA </p>
                                                    <div class="text-center">
                                                        <img src="{{asset('images/resultadotest/naranja.png')}}" class="img-fluid" alt="Responsive image">
                                                    </div>
                                                    
                                                @elseif ($repuesta == 'urgente')
                                                    <p class="text-center text-danger font-weight-bold mt-4">URGENTE </p>
                                                    <div class="text-center">
                                                        <img src="{{asset('images/resultadotest/rojo.png')}}" class="img-fluid" alt="Responsive image">
                                                    </div>
                                                @else
                                                    <p class="text-center text-success font-weight-bold mt-4">No presentas ningún nivel de violencia</p>
                                                    <div class="text-center">
                                                        <img src="{{asset('images/resultsuccess.png')}}" class="img-fluid" alt="Responsive image">
                                                    </div>
                                                @endif
                                            @endif
                                        </div>
                
                                        <div class="col-sm-12">
                                            <p>Estimada <strong class="text-capitalize">Usuaria</strong>, en base a los resultados del test diligenciado, te recomendamos
                                            revisar algunas de las opciones de atención que tienes disponible.</p>
                                        </div>
                
                                        <div class="col-sm-4 text-center">
                                            <div class="team1__item text-center mb-50">
                                                <div class="team1__thumb">
                                                    <img src="{{asset('images/resultadotest/directorio.png')}}" class="img-fluid" alt="directorio">
                                                </div>
                                                <div class="team1__content">
                                                    <h4>Directorio</h4>
                                                    <p class="m-0" style="color: #af5fd0;">Ver más</p>
                                                    <div class="team1__btn" >
                                                        <a href="{{route('directorios')}}" target="_blank">ír a directorio</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 text-center">
                                            <div class="team1__item text-center mb-50">
                                                <div class="team1__thumb">
                                                    <img src="{{asset('images/resultadotest/cita.png')}}" class="img-fluid" alt="directorio">
                                                </div>
                                                <div class="team1__content">
                                                    <h4>Agendar Cita</h4>
                                                    <p class="m-0" style="color: #af5fd0;">Ver más</p>
                                                    <div class="team1__btn" >
                                                        <a href="{{route('citation.agendar')}}" target="_blank">Ver Citas</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 text-center">
                                            <div class="team1__item text-center mb-50">
                                                <div class="team1__thumb">
                                                    <img src="{{asset('images/resultadotest/chat.png')}}" class="img-fluid" alt="directorio">
                                                </div>
                                                <div class="team1__content">
                                                    <h4>Chat en WhatsApp</h4>
                                                    <p class="m-0" style="color: #af5fd0;">Ver más</p>
                                                    <div class="team1__btn" >
                                                        <a href="https://api.whatsapp.com/send?phone=573213039424&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20Amate"
                                                        target="_blank">Escribír a Consultorio</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if ($repuesta == 'urgente')
                                            <div class="col-sm-12 text-center mt-3">
                                                <a href="tel:155"><img src="{{asset('images/resultadotest/llamanos.png')}}" style="border: 0px #fff" class="img-thumbnail" alt="línea 155 imagen distintiva"></a>
                                            </div>
                                        @endif
                
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </section>
        <!-- |=====|| Register End ||=================| -->
        <!-- |==========================================| -->
     <!-- |==========================================| -->
     <x-slot name="js">
        <script src="{{asset('vendors/jquery-validation/jquery.validate.min.js')}}"></script>
        <script src="{{asset('vendors/jquery-validation/additional-methods.min.js')}}"></script>
        <script>
            $(function () {
            });
            
        </script>
    </x-slot>

</x-main-frontend>
