<x-main-layout>
    <!-- title -->
    @section('title')Mi Perfil @endsection

     <!---- CSS ----->
    <x-slot name="css">
    </x-slot>    
    <div class="main-panel"> 
        <div class="content-wrapper">
        <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Mi Perfil</h4>
                    <p class="card-description">
                        Puedes editar tus datos del perfil. 
                    </p>
                  <div class="row mb-2 d-flex align-items-center">
                    <!----- dashboard for ADMINISTRADOR ----->
                        <div class="col-sm-12">
                            <form class="forms-sample" id="quickForm">
                                <div class="row py-4">
                                  <div class="col-md-6 offset-md-3 text-center">
                                    <!-- Upload image input-->
                                    <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                                        <input id="upload" type="file" onchange="readURL(this);" name="imgLogo" class="form-control border-0">
                                        <label id="upload-label" for="upload" class="font-weight-light text-muted">Imágen</label>
                                        <div class="input-group-append">
                                            <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fas fa-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Subir Imágen</small></label>
                                        </div>
                                    </div>
                                    <small>Dimensiones recomendadas Ancho(220) x Alto(220)</small>
                            
                                    <!-- Uploaded image area-->
                                    @if ($user->image == null)
                                        <div class="image-area mt-4"><img id="imageResult" src="" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>
                                    @else
                                    <div class="image-area mt-4"><img id="imageResult" src="{{$user->image}}" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>
                                    @endif
                                    
                                  </div>
                                </div>
                                <div class="row">
                                    <input type="hidden" name="id" value="{{$user->id}}">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Nombres</label>
                                            <input type="text" class="form-control" name="name" id="exampleInputName1" value="{{$user->name}}" placeholder="">
                                        </div>
                                    </div>
                            
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputName2">Apellidos</label>
                                            <input type="text" class="form-control" name="lastname" id="exampleInputName2" value="{{$user->lastname}}" placeholder="">
                                        </div>
                                    </div>
                            
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputName3">Correo Electrónico</label>
                                            <input type="text" class="form-control" name="email" id="exampleInputName3" value="{{$user->email }}" placeholder="">
                                        </div>
                                    </div>
                            
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputName4">N° de Cédula</label>
                                            <input type="text" class="form-control" name="identification" id="exampleInputName4" value="{{$user->identification}}" placeholder="">
                                        </div>
                                    </div>

                                    @hasanyrole('Psicologo|Juidico')
                                      <div class="col-sm-6">
                                          <div class="form-group">
                                              <label for="exampleInputName5">Área donde está inscrito</label>
                                              <input type="text" class="form-control" name="area" id="exampleInputName5" value="{{$user->area}}" placeholder="">
                                          </div>
                                      </div>
                                    @endrole

                                    @role('Usuario')
                                      <div class="col-sm-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="checkdiscapacity">
                                            <label class="form-check-label" for="flexCheckDefault">
                                              ¿Presenta alguna Discapacidad?
                                            </label>
                                        </div>
                                      </div>
                                      <div class="col-sm-12 mb-2" id="area">
                                          <textarea class="form-control" name="discapacity" placeholder="Describa la discapacidad" style="height: 100px">{{$user->discapacity}}</textarea>
                                      </div>
                                    @endrole
                                </div>
                                
                                <button type="submit" class="btn btn-primary me-2">Actualizar</button>
                                <a href="{{route('dashboard.index')}}" class="btn btn-light">Cancelar</a>
                              </form>
                        </div>
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

      $('#area').hide();
            $('#checkdiscapacity').change(function() {
                if($(this).is(":checked")) {
                    $('#area').show();
                }else{
                    $('#area').hide();
                }

                //'unchecked' event code
            });
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
                    var url = "{{route('usuarios.update')}}";

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
                                timer: 2000,
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
                                title: 'Perfil Actualizado Correctamente.',
                                icon: 'success',
                                button: true,
                                timer: 2000
                            });

                            setTimeout(function(){
                                location.href = "{{route('usuario.perfil')}}";
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