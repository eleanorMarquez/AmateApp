<x-main-layout>
    <!-- title -->
    @section('title')Mis Citas @endsection

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
                           <h4 class="card-title">Listado de Mis Citas Agendadas</h4>
                          </div>
                          <div class="col-sm-6">
                          </div>
                        </div>
                  <p class="card-description">
                    Si deseas cancelar algunas de tus citas puedes hacerlo sobre el botón de <code>Cancelar Cita</code>
                  </p>

                    <table id="listarmiscitas" class="display table table-striped" style="width:100%">
                      <thead>
                        <tr>
                          <th>N° de Cita</th>
                          <th>Fecha de la Cita</th>
                          <th>Hora de la Cita</th>
                          <th>Titulo de la Cita</th>
                          <th>Cancelar Cita</th>
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
        
          var tabla_usuarios = $('#listarmiscitas').DataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.4/i18n/es_es.json"
                },
                "ajax": "{{route('citareservadas.list')}}",
            });

            function cancelaCita(id){
            //console.log("soy id"+id);
                Swal.fire({
                    title: 'Cancelar Cita',
                    text: "¿Estás seguro de cancelar esta Cita?",
                    icon: 'question',
                    showCancelButton: "Cancelar",
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Si, cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var url = "mis-citas/cancelar/"+id;
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
                                    text: 'Cancelando cita, espere...',
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
                                    title: 'Cita Cancelada!',
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