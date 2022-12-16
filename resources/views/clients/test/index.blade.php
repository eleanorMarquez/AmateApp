<x-main-layout>
    <!-- title -->
    @section('title')Realizar Test @endsection

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
                           <h4 class="card-title">Contestar Encuesta</h4>
                          </div>
                          <div class="col-sm-6">
                          </div>
                        </div>
                  <p class="card-description">
                    Estimado usuario, es importante que realice este test con la mayor discreción del caso.
                    Para ello de clic sobre cada pregunta y escoja una opción de respuesta para cada una.
                  </p>
                  <form class="" method="POST" action="{{route('test.store')}}" id="test">
                    @csrf
                    <div class="row">
                      <x-form-test-user></x-form-test-user>
                    </div>
                  </form>
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
      <script src="{{asset('vendors/jquery-validation/jquery.validate.min.js')}}"></script>
        <script src="{{asset('vendors/jquery-validation/additional-methods.min.js')}}"></script>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script>
        $(function () {
         /*  $("input").each(function(){
          if($(this).val()==""){
          alert("vacio");
          return false;
          }
          }); */
        }); 
      </script>
    </x-slot>
    
</x-main-layout>