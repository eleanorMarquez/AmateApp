<x-main-layout>
    <!-- title -->
    @section('title')Gestión de Noticias @endsection

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
                           <h4 class="card-title">Administrar Noticias</h4>
                          </div>
                          <div class="col-sm-6">
                            <a href="{{ route('noticia.create') }}" class="btn btn-primary float-sm-left"><i class="mdi mdi-plus"></i>
                              Nueva Noticia
                            </a>
                          </div>
                        </div>
                  <p class="card-description">
                    Listado de <code>noticias</code> registradas.
                  </p>
                  
                    <table id="listarnoticias" class="display table table-striped" style="width:100%">
                      <thead>
                        <tr>
                          <th>N°</th>
                          <th>Titulo Noticia</th>
                          <th>Autor</th>
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
        
        var tabla_usuarios = $('#listarnoticias').DataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.4/i18n/es_es.json"
                },
                "ajax": "{{route('noticia.obtener')}}",
        });

        function eliminarNoticia(id){
            //console.log("soy id"+id);
                Swal.fire({
                    title: 'Eliminar Noticia',
                    text: "¿Estás seguro de eliminar el registro de esta Noticia?",
                    icon: 'question',
                    showCancelButton: "Cancelar",
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var url = "noticias/destroy/"+id;
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
                                    text: 'Eliminando noticia, espere...',
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
                                    title: 'Noticia Eliminada!',
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