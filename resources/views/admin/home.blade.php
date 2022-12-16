<x-main-layout>
    <!-- title -->
    @section('title')Inicio @endsection

     <!---- CSS ----->
    <x-slot name="css">
    </x-slot>    
    <div class="main-panel"> 
        <div class="content-wrapper">
        <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row mb-2 d-flex align-items-center">
                    <!----- dashboard for ADMINISTRADOR ----->
                    @role('Admin')
                        <div class="col-sm-6">
                          <lottie-player src="{{asset('animations/dash.json')}}"  background="transparent"  
                            speed="1"  style="width: 300px; height: 300px; margin: 0 auto;" loop autoplay></lottie-player>

                            
                        </div>
                        <div class="col-sm-6">
                          <div class="row">
                            <!-- count profesionales-->
                            <div class="col-md-6 col-xl-6 mb-5">
                              <div class="team1__item text-center mb-30">
                                  <div class="team1__thumb ">
                                      <img src="{{ asset('images/profesionales.png')}}" class="mt-2" alt="Profesionales amate">
                                  </div>
                                  <div class="team1__content">
                                      <h4 class="text-white"></h4>
                                      <p class="fs-5"><span class="fw-bold text-uppercase">Profesionales Registrados</span></p>
                                      <div class="team1__btn">
                                          <button  class="btn btn-light fw-bold" style="cursor: default;">{{$count_profesionales}}</button>
                                      </div>
                                  </div>
                              </div>
                            </div>

                            <!-- count usuarios-->
                            <div class="col-md-6 col-xl-6 mb-5">
                              <div class="team1__item text-center mb-30">
                                  <div class="team1__thumb">
                                      <img src="{{ asset('images/mujeres.png')}}" class="mt-2" alt="Usuarios amate">
                                  </div>
                                  <div class="team1__content">
                                      <h4 class="text-white"></h4>
                                      <p class="fs-5"><span class="fw-bold text-uppercase">Pacientes Registrados</span></p>
                                      <div class="team1__btn">
                                          <button  class="btn btn-light fw-bold" style="cursor: default;">{{$count_usuarios}}</button>
                                      </div>
                                  </div>
                              </div>
                            </div>

                            <!-- count eventos-->
                            <div class="col-md-6 col-xl-6 mb-5">
                              <div class="team1__item text-center mb-30">
                                  <div class="team1__thumb">
                                      <img src="{{ asset('images/calendar.png')}}" alt="Eventos amate">
                                  </div>
                                  <div class="team1__content">
                                      <h4 class="text-white"></h4>
                                      <p class="fs-5"><span class="fw-bold text-uppercase">Eventos Registrados</span></p>
                                      <div class="team1__btn">
                                          <button  class="btn btn-light fw-bold" style="cursor: default;">{{$count_events}}</button>
                                      </div>
                                  </div>
                              </div>
                            </div>

                            <!-- count noticias-->
                            <div class="col-md-6 col-xl-6 mb-5">
                              <div class="team1__item text-center mb-30">
                                  <div class="team1__thumb">
                                      <img src="{{ asset('images/calendar.png')}}" alt="Noticias amate">
                                  </div>
                                  <div class="team1__content">
                                      <h4 class="text-white"></h4>
                                      <p class="fs-5"><span class="fw-bold text-uppercase">Noticias Registradas</span></p>
                                      <div class="team1__btn">
                                          <button  class="btn btn-light fw-bold" style="cursor: default;">{{$count_noticias}}</button>
                                      </div>
                                  </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-6">
                            <h4>Estadística de Total de Respuestas de Usuarios Registrados en el sistema por Niveles de Violencia</h4>
                            <hr>
                            <div>
                              @if (count($dtos)>0)
                              <script>
                                  var countsAnswertests = {!! json_encode($dtos) !!};
                              </script>
                                <canvas id="myChart"></canvas>
                              @endif
                              
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <h4>Estadística de Total de Respuestas de Usuarios Anónimos por Niveles de Violencia</h4>
                            <hr>
                            <div>
                              @if (count($dtos_anonimo)>0)
                              <script>
                                  var countsAnswertests2 = {!! json_encode($dtos_anonimo) !!};
                              </script>
                                <canvas id="myChart2"></canvas>
                              @endif
                              
                          </div>
                        </div>
                        @else

                        <!----- dashboard for Profesionales ----->
                          @role('Usuario')
                              <div class="col-sm-6">
                                <lottie-player src="{{asset('animations/dash.json')}}"  background="transparent"  
                                  speed="1"  style="width: 300px; height: 300px; margin: 0 auto;" loop autoplay></lottie-player>

                                  
                              </div>
                              <div class="col-sm-6">
                                <div class="row">
                                  <!-- count profesionales-->
                                  <div class="col-md-6 col-xl-6 mb-5">
                                    <div class="team1__item text-center mb-30">
                                        <div class="team1__thumb">
                                            <img src="{{ asset('images/test.png')}}" class="mt-2" alt="Profesionales amate">
                                        </div>
                                        <div class="team1__content">
                                            <h4 class="text-white"></h4>
                                            <p class="fs-5"><span class="fw-bold text-uppercase">Realizar Test</span></p>
                                            <div class="team1__btn">
                                              <a href="{{route('test.index')}}" class="btn btn-light fw-bold" >¡Ver Test!</a>
                                            </div>
                                        </div>
                                    </div>
                                  </div>

                                  <!-- count usuarios-->
                                  <div class="col-md-6 col-xl-6 mb-5">
                                    <div class="team1__item text-center mb-30">
                                        <div class="team1__thumb">
                                            <img src="{{ asset('images/calendar.png')}}" class="mt-2" alt="Usuarios amate">
                                        </div>
                                        <div class="team1__content">
                                            <h4 class="text-white"></h4>
                                            <p class="fs-5"><span class="fw-bold text-uppercase">Agendar Cita</span></p>
                                            <div class="team1__btn">
                                                <a href="{{route('citation.agendar')}}" class="btn btn-light fw-bold" >¡Ver Citas!</a>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                          
                          @else
                              <div class="col-sm-6">
                                  <lottie-player src="{{asset('animations/dash.json')}}"  background="transparent"  
                                    speed="1"  style="width: 300px; height: 300px; margin: 0 auto;" loop autoplay></lottie-player>

                                    
                                </div>
                                <div class="col-sm-6">
                                  <div class="row">

                                    <!-- count eventos-->
                                    <div class="col-md-6 col-xl-6 mb-5">
                                      <div class="team1__item text-center mb-30">
                                          <div class="team1__thumb">
                                              <img src="{{ asset('images/calendar.png')}}" alt="Eventos amate">
                                          </div>
                                          <div class="team1__content">
                                              <h4 class="text-white"></h4>
                                              <p class="fs-5"><span class="fw-bold text-uppercase">Eventos que he Registrado</span></p>
                                              <div class="team1__btn">
                                                  <a  class="btn btn-light fw-bold" style="cursor: default;">{{$count_events}}</a>
                                              </div>
                                          </div>
                                      </div>
                                    </div>

                                    <!-- count noticias-->
                                    <div class="col-md-6 col-xl-6 mb-5">
                                      <div class="team1__item text-center mb-30">
                                          <div class="team1__thumb">
                                              <img src="{{ asset('images/calendar.png')}}" alt="Noticias amate">
                                          </div>
                                          <div class="team1__content">
                                              <h4 class="text-white"></h4>
                                              <p class="fs-5"><span class="fw-bold text-uppercase">Noticias que he Registrado</span></p>
                                              <div class="team1__btn">
                                                  <button  class="btn btn-light fw-bold" style="cursor: default;">{{$count_noticias}}</button>
                                              </div>
                                          </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <h4>Estadística de Total de Respuestas de Usuarios Registrados en el sistema por Niveles de Violencia</h4>
                                  <hr>
                                  <div>
                                    @if (count($dtos)>0)
                                    <script>
                                        var countsAnswertests = {!! json_encode($dtos) !!};
                                    </script>
                                      <canvas id="myChart"></canvas>
                                    @endif
                                    
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <h4>Estadística de Total de Respuestas de Usuarios Anónimos por Niveles de Violencia</h4>
                                  <hr>
                                  <div>
                                    @if (count($dtos_anonimo)>0)
                                    <script>
                                        var countsAnswertests2 = {!! json_encode($dtos_anonimo) !!};
                                    </script>
                                      <canvas id="myChart2"></canvas>
                                    @endif
                                    
                                </div>
                          @endrole
                    @endrole
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
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <script>
        var $chartByCountsTests = $('#myChart');
        var $chartByCountsTests2 = $('#myChart2');
        function initChartt($chart,theValues) {

            // Create chart
            var testsChart = new Chart($chart, {
              type: 'bar',
              options: {
                scales: {
                  yAxes: [{
                    ticks: {
                      callback: function(value) {
                        if (!(value % 10)) {
                          //return '$' + value + 'k'
                          return Number(value).toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ','); 
                        }
                      }
                    }
                  }]
                },
                tooltips: {
                  callbacks: {
                    label: function(item, data) {
                      var label = data.datasets[item.datasetIndex].label || '';
                      var yLabel = Number(item.yLabel).toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                      var content = '';

                      if (data.datasets.length > 1) {
                        content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                      }

                      content += '<span class="popover-body-value">' + yLabel + '</span>';

                      return content;
                    }
                  }
                }
              },
              data: {
                //labels: //['Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                  label: "Total",
                  backgroundColor: ["#a12312","#ff8000","#ffff00"],
                  data: theValues//[25, 20, 30, 22, 17, 29]
                }]
              }
            });

            // Save to jQuery object
            $chart.data('chart', testsChart);
        }

        function initChartt2($chart,theValues) {

          // Create chart
          var testsChart2 = new Chart($chart, {
            type: 'bar',
            options: {
              scales: {
                yAxes: [{
                  ticks: {
                    callback: function(value) {
                      if (!(value % 10)) {
                        //return '$' + value + 'k'
                        return Number(value).toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ','); 
                      }
                    }
                  }
                }]
              },
              tooltips: {
                callbacks: {
                  label: function(item, data) {
                    var label = data.datasets[item.datasetIndex].label || '';
                    var yLabel = Number(item.yLabel).toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                    var content = '';

                    if (data.datasets.length > 1) {
                      content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                    }

                    content += '<span class="popover-body-value">' + yLabel + '</span>';

                    return content;
                  }
                }
              }
            },
            data: {
              //labels: ['Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
              datasets: [{
                label: "Total",
                backgroundColor: ["#a12312","#ff8000","#ffff00"],
                data: theValues//[25, 20, 30, 22, 17, 29]
              }]
            }
          });

          // Save to jQuery object
          $chart.data('chart', testsChart2);
        }

            if ($chartByCountsTests.length) {
              initChartt($chartByCountsTests,countsAnswertests);
            }

            if ($chartByCountsTests2.length) {
              initChartt2($chartByCountsTests2,countsAnswertests2);
            }
      </script>
    </x-slot>
    
</x-main-layout>