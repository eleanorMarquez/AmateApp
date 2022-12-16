<x-main-layout>
    <!-- title -->
    @section('title')Detalles del Test @endsection

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
                           <h4 class="card-title">Detalles del Test</h4>
                          </div>
                          <div class="col-sm-6">
                            @if (!empty($test))
                              <a href="{{route('test.downloadpdf', $user->id)}}" class="btn btn-outline-info btn-fw float-right ml-2"><i class="fas fa-print"></i>Descargar Test</a>
                            @endif
                            <a href="javascript:history.back()" class="btn btn-outline-primary btn-fw float-right"><i class="fas fa-arrow-left"></i>Volver</a>
                          </div>
                        </div>
                  <p class="card-description">
                    @if (!empty($test))
                        A continuación podrá ver en detalle las respuestas del test de <strong>{{$user->name}} {{$user->lastname}}</strong> 
                    @else
                        El usuario <strong>{{$user->name}} </strong> no ha realizado el test!
                    @endif
                  </p>

                  @if (!empty($test))
                    <h5 class="text-center" style="color: #af5fd0 !important;">TEST REALIZADO </h5>
                    <div class="row">
                      <div class="col-sm-12">
                        <h6>Nivel de Violencia presentado: 
                          <strong>
                            @if ($test_result=='urgente')
                              <span class="badge bg-danger">URGENTE</span>
                            @elseif($test_result=='reacciona')
                              <span class="badge bg-orange">REACCIONA</span>
                            @elseif($test_result=='alerta')
                              <span class="badge bg-warning">ALERTA</span>
                              @else
                              <span class="badge bg-success">Ninguno</span>
                            @endif
                          </strong>
                        </h6>
                      </div>
                      <div class="col-sm-6">
                        <h6 class="text-center"><strong>Pregunta</strong></h6>
                      </div>
                      <div class="col-sm-6">
                        <h6 class="text-center"><strong>Respuesta Dada</strong></h6>
                      </div>
                      @foreach ($test as $key => $item)
                        <div class="col-sm-6 border-bottom pb-2 pt-1">
                            <span>#{{$key+1}} | {{$item->find($item->id)->questionsda->ask}}</span>
                        </div>
                        <div class="col-sm-6 border-bottom pb-2 pt-1">
                          @if ($item->answer == 0)
                              <span>No</span>
                          @else
                              <span>Sí</span>
                          @endif
                        </div>
                      @endforeach
                    </div>
                  @endif
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