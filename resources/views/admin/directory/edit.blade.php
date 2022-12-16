<x-main-layout>
    <!-- title -->
    @section('title')Editar Directorio @endsection

     <!---- CSS ----->
    <x-slot name="css">
      <link rel="stylesheet" href="{{asset('css/dashboad.css') }}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.4/trix.css" integrity="sha512-qjOt5KmyILqcOoRJXb9TguLjMgTLZEgROMxPlf1KuScz0ZMovl0Vp8dnn9bD5dy3CcHW5im+z5gZCKgYek9MPA==" crossorigin="anonymous" />
    </x-slot>    
    <div class="main-panel"> 
        <div class="content-wrapper">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('noticia.index') }}">Inicio</a></li>
              <li class="breadcrumb-item active" aria-current="page">Editar Entidad</li>
              <li class="breadcrumb-item active" aria-current="page">{{$directory->title}}</li>
            </ol>
          </nav>
        <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                           <h4 class="card-title">Editar Entidad</h4>
                        </div>
                        <div class="col-sm-6">
                        </div>
                    </div>
                  <p class="card-description">
                    Actualizar Información de <strong>{{$directory->title}}</strong> 
                  </p>
                  <!----- make register of user ---->
                  <x-form-edit-directory identity="{{$directory->id}}"></x-form-edit-directory>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.4/trix.js" integrity="sha512-zEL66hBfEMpJUz7lHU3mGoOg12801oJbAfye4mqHxAbI0TTyTePOOb2GFBCsyrKI05UftK2yR5qqfSh+tDRr4Q==" crossorigin="anonymous" defer></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
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
              entity: {
                required: true,
              },
              area_of_contact: {
                required: true,
              },
              phones: {
                required: true,
              },
              ubication: {
                required: true,
              },
            },
            messages: {
              entity: {
                required: "Por favor ingrese el nombre",
              },
              area_of_contact: {
                required: "Por favor digite el nombre del área",
              },
              phones: {
                required: "Por favor ingrese un número",
              },
              ubication: {
                required: "Por favor digite una dirección",
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
                    var url = "{{route('directorio.update')}}";

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
                                title: 'Entidad actualizada exitosamente.',
                                icon: 'success',
                                button: true,
                                timer: 2000
                            });

                            setTimeout(function(){
                                location.href = "{{route('directorio.index')}}";
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
        </script>
    </x-slot>
    
</x-main-layout>