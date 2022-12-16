<x-main-layout>
    <!-- title -->
    @section('title')Gestiónar Test @endsection

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
                           <h4 class="card-title">Administrar Preguntas del Test</h4>
                          </div>
                          <div class="col-sm-6">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                              <i class="mdi mdi-account-plus"></i>Registrar Pregunta del test
                            </button>
                            <!----- register new----->
                            <x-form-register-questions></x-form-register-questions>

                          </div>
                          
                        </div>
                  <p class="card-description">
                    Listado de preguntas del <code>test</code> registradas.
                  </p>
                  
                  <table id="listar" class="display table table-striped" style="width:100%">
                      <thead>
                        <tr>
                          <th>N°</th>
                          <th>Pregunta</th>
                          <th>Categoría</th>
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
      <script src="{{asset('vendors/jquery-validation/jquery.validate.min.js')}}"></script>
        <script src="{{asset('vendors/jquery-validation/additional-methods.min.js')}}"></script>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script>
        
          var tabla_usuarios = $('#listar').DataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.4/i18n/es_es.json"
                },
                "ajax": "{{route('questions.obtener')}}",
            });

                 /*  ==========================================
          SHOW UPLOADED IMAGE
      * ========================================== */
      function readURL(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function (e) {
                  $('#imageResult')
                      .attr('src', e.target.result);
              };
              reader.readAsDataURL(input.files[0]);
          }
      }

      $(function () {
          $('#upload').on('change', function () {
              readURL(input);
          });
      });

       /*  ==========================================
          SHOW UPLOADED IMAGE NAME
      * ========================================== */
      var input = document.getElementById( 'upload' );
      var infoArea = document.getElementById( 'upload-label' );

      input.addEventListener( 'change', showFileName );
      function showFileName( event ) {
        var input = event.srcElement;
        var fileName = input.files[0].name;
        infoArea.textContent = 'File name: ' + fileName;
      }

          $('#quickForm').validate({
            rules: {
              ask: {
                required: true,
              },
              imgLogo: {
                required: true,
              },
              audio: {
                required: true,
              },
              category: {
                required: true,
              },
            },
            messages: {
              ask: {
                required: "Por favor digite la pregunta",
              },
              imgLogo: {
                required: "Por favor seleccione una imágen",
              },
              audio: {
                required: "Por favor cargue un audio ",
              },
              category: {
                required: "Por favor seleccione una categoría",
              },
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
              error.addClass('invalid-feedback');
              element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
              $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
              $(element).removeClass('is-invalid');
            },
            submitHandler: function(form){
                // agregar data
                    //ruta
                    var url = "{{route('questions.store')}}";

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        type: "post",
                        encoding:"UTF-8",
                        url: url,
                        data: new FormData(form),
                        processData: false,
                        contentType: false,
                        dataType:'json',
                        beforeSend:function(){
                          Swal.fire({
                                title: 'Validando datos, espere por favor...',
                                button: false,
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
                                title: 'Pregunta guardada exitosamente.',
                                icon: 'success',
                                button: true,
                                timer: 2000
                            });

                            setTimeout(function(){
                                location.href = "{{route('questions.index')}}";
                            },2000);

                        } else {
                            setTimeout(function(){
                              Swal.fire({
                                    title: respuesta.mensaje,
                                    icon: "error",
                                    button: false,
                                    timer: 4000
                                });
                            },2000);
                        }
                    }).fail(function(resp){
                        console.log(resp);
                    });
            }
          });
          function eliminarPregunta(id){
            //console.log("soy id"+id);
                Swal.fire({
                    title: 'Eliminar Pregunta',
                    text: "¿Estás seguro de eliminar esta pregunta del Test?",
                    icon: 'question',
                    showCancelButton: "Cancelar",
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var url = "preguntas-test/destroy/"+id;
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
                                    text: 'Eliminando pregunta, espere...',
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
                                    title: 'Pregunta Eliminada!',
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
          function validarExtensionArchivo(){
            var fileInput = document.getElementById('file');
            var filePath = fileInput.value;
            var allowedExtensions = /(\.wav|\.mp3|\.mid)$/i;
            if(!allowedExtensions.exec(filePath)){
                Swal.fire({
                    title: 'Solo se permite archivos de audio con esta extensión .wav/.mp3/.mid .',
                    icon: "error",
                    button: false,
                    timer: 4000
                });
                //alert('Solo se permite archivos de audio con esta extensión .wav/.mp3/.mp4/.mid .');
                fileInput.value = '';
                return false;
            }else{
                //Otro Código
            }
          }
           
      </script>
    </x-slot>
    
</x-main-layout>