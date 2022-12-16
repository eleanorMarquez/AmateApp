<x-main-layout>
    <!-- title -->
    @section('title')Crear Usuario @endsection

     <!---- CSS ----->
    <x-slot name="css">
      <link rel="stylesheet" href="{{asset('css/dashboad.css') }}">
    </x-slot>    
    <div class="main-panel"> 
        <div class="content-wrapper">
        <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                           <h4 class="card-title">Crear nuevo usuario</h4>
                        </div>
                        <div class="col-sm-6">
                        </div>
                    </div>
                  <p class="card-description">
                    Registro de profesionales <code>Abogado o Psicólogo</code>
                  </p>
                  <!----- make register of user ---->
                  <x-form-register-user></x-form-register-user>
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
              email: {
                required: true,
                email: true,
              },
              identification: {
                required: true,
                minlength: 7
              },
              lastname: {
                required: true,
              },
              name: {
                required: true,
              },
              appointment: {
                required: true,
              },
              area: {
                required: true,
              },
            },
            messages: {
              email: {
                required: "Por favor ingrese un Correo Electrónico",
                email: "Ingrese una dirección de correo válida",
              },
              identification: {
                required: "Por favor ingrese el n° de cédula",
                minlength: "Debe tener al menos 7 digitos",
              },
              lastname: {
                required: "Por favor ingrese el apellido",
              },
              name: {
                required: "Por favor ingrese el nombre",
              },
              appointment: {
                required: "Por favor seleccione un cargo",
              },
              area: {
                required: "Por favor ingrese el area",
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
                    var url = "{{route('usuarios.store')}}";

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
                                title: 'Usuario registrado exitosamente.',
                                icon: 'success',
                                button: true,
                                timer: 2000
                            });

                            setTimeout(function(){
                                location.href = "{{route('usuarios.index')}}";
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