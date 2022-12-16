<x-main-layout>
    <!-- title -->
    @section('title')Gestión de Citas @endsection

     <!---- CSS ----->
    <x-slot name="css">
        <!-------css fullcalendar -------->
        <link rel="stylesheet" href="{{ asset('vendors/fullcalendar/main.css') }}">
    </x-slot>    
    <div class="main-panel"> 
        <div class="content-wrapper">
        <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                        <div class="row mb-2">
                          <div class="col-sm-6">
                           <h4 class="card-title">Administrar Citas</h4>
                          </div>
                          <div class="col-sm-6">
                          </div>
                        </div>
                  <p class="card-description">
                    Listado de <code>directorio</code> registrados.
                  </p>
                  <div class="mt-4">
                    <div class="response"></div>
                    <div id="calendar"></div>
                </div>
                </div>
              </div>
          </div>
          </div>
        </div>
        @include('components.footer-admin')
    </div>
        
        <!-- partial -->
        <!-- Modal -->
    <x-agenda-profesional></x-agenda-profesional>
    
    
     <!-- |==============================| -->
    <x-slot name="js">
        <!-- fullcalendar -->
        <script src="{{ asset('vendors/fullcalendar/main.js') }}"></script>
        <script src="{{ asset('vendors/fullcalendar/locales-all.js') }}"></script>
        <script src="{{ asset('vendors/fullcalendar/locales/es.js') }}"></script>

      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script src="{{ asset('asset/js/calendariocita.js') }}"></script>
      <script>
        $(document).ready(function() {
          $('#link').hide();
          $('#isvirtual').val("off");
            $('#isvirtual').change(function() {
                if(this.checked) {
                  $('#link').show(); 
                  $('#isvirtual').val("on");
                }else{
                  $('#link').hide(); 
                  $('#isvirtual').val("off");
                }
                       
            });
        });
      </script>
    </x-slot>
    
</x-main-layout>