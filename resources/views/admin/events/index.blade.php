<x-main-layout>
    <!-- title -->
    @section('title')Gestión de Eventos @endsection

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
                           <h4 class="card-title">Administrar Eventos</h4>
                          </div>
                          <div class="col-sm-6">
                            <a href="{{ route('evento.create') }}" class="btn btn-primary float-sm-left"><i class="mdi mdi-plus"></i>
                              Nuevo Evento
                            </a>
                          </div>
                        </div>
                  <p class="card-description">
                    Listado de usuarios <code>profesionales</code> registrados.
                  </p>
                  
                  <table id="listar" class="display table table-striped" style="width:100%">
                      <thead>
                        <tr>
                          <th>N°</th>
                          <th>Nombre del Evento</th>
                          <th>Autor</th>
                          <th>Fecha del evento</th>
                          <th>Fecha de Publicación</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                  </table>
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
        
          var tabla_usuarios = $('#listar').DataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.4/i18n/es_es.json"
                },
                "ajax": "{{route('evento.obtener')}}",
            });

          function eliminarEvento(id){
            //console.log("soy id"+id);
                Swal.fire({
                    title: 'Eliminar Evento',
                    text: "¿Estás seguro de eliminar el registro de este evento?",
                    icon: 'question',
                    showCancelButton: "Cancelar",
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var url = "eventos/destroy/"+id;
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
                                    text: 'Eliminando evento, espere...',
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
                                    title: 'Evento Eliminado!',
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
                })
        }
      </script>
    </x-slot>
    
</x-main-layout>