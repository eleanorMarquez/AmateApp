<x-main-layout>
    <!-- title -->
    @section('title')Resultado del Test @endsection

     <!---- CSS ----->
    <x-slot name="css">
    </x-slot>    
    <div class="main-panel"> 
        <div class="content-wrapper">
        <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
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
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h4 class="card-title">Resultado del Test</h4>
                        </div>
                        <div class="col-sm-6">
                        </div>
                    </div>
                  <p class="card-description">
                  </p>
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
                            <p>Estimada <strong class="text-capitalize">{{auth()->user()->name}}</strong>, en base a los resultados del test diligenciado, te recomendamos
                            revisar algunas de las opciones de atención que tienes disponible.</p>
                        </div>

                        <div class="col-sm-4 text-center">
                            <div class="team2__item text-center mb-50">
                                <div class="team2__thumb">
                                    <img src="{{asset('images/resultadotest/directorio.png')}}" class="img-fluid" alt="directorio">
                                </div>
                                <div class="team2__content">
                                    <h4>Directorio</h4>
                                    <p class="m-0" style="color: #af5fd0;">Ver más</p>
                                    <div class="team2__btn" >
                                        <a href="{{route('directorios')}}" target="_blank">ír a directorio</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 text-center">
                            <div class="team2__item text-center mb-50">
                                <div class="team2__thumb">
                                    <img src="{{asset('images/resultadotest/cita.png')}}" class="img-fluid" alt="directorio">
                                </div>
                                <div class="team2__content">
                                    <h4>Agendar Cita</h4>
                                    <p class="m-0" style="color: #af5fd0;">Ver más</p>
                                    <div class="team2__btn" >
                                        <a href="{{route('citation.agendar')}}" target="_blank">Ver Citas</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 text-center">
                            <div class="team2__item text-center mb-50">
                                <div class="team2__thumb">
                                    <img src="{{asset('images/resultadotest/chat.png')}}" class="img-fluid" alt="directorio">
                                </div>
                                <div class="team2__content">
                                    <h4>Chat en WhatsApp</h4>
                                    <p class="m-0" style="color: #af5fd0;">Ver más</p>
                                    <div class="team2__btn" >
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
        @include('components.footer-admin')
    </div>
        
        <!-- partial -->
    
    
     <!-- |==============================| -->
    <x-slot name="js">
      <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"></script>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script>
                   
      </script>
    </x-slot>
    
</x-main-layout>