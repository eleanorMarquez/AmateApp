<x-main-layout>
    <!-- title -->
    @section('title')Editar Pregunta del Test @endsection

     <!---- CSS ----->
    <x-slot name="css">
      
    </x-slot>    
    <div class="main-panel"> 
        <div class="content-wrapper">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('questions.index') }}">Inicio</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Editar Pregunta</li>
                  <li class="breadcrumb-item active" aria-current="page">Pregunta N° {{$pregunt->id}}</li>
                </ol>
              </nav>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <form id="quickForm" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="{{$pregunt->id}}">
                                <div class="row">
                                    <div class="col-sm-6 col-12">
                                        <p><strong>Actualizar Audio</strong></p>
                                        <div class="form-group text-center">
                                            @if ($pregunt->audio != null)
                                                <audio controls>
                                                    <source src="{{$pregunt->audio}}" type="audio/mp3">
                                                </audio>
                                            @else
                                                <h6><strong>No has cargado ningún audio</strong></h6>
                                            @endif
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-form-label">Cargar nuevo audio de la pregunta</label>
                                            <input type="file" class="form-control" id="file" name="audio" onchange="return validarExtensionArchivo()" />
                                        </div>
                                        <hr>
                                        <p><strong>Actualizar Imágen</strong></p>
                                        <!-- Upload image input-->
                                        <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                                            <input id="upload" type="file" onchange="readURL(this);" name="imgLogo" class="form-control border-0">
                                            <label id="upload-label" for="upload" class="font-weight-light text-muted">Imágen</label>
                                            <div class="input-group-append">
                                                <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fas fa-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Subir nueva Imágen</small></label>
                                            </div>
                                        </div>
                                
                                        <!-- Uploaded image area-->
                                        <div class="image-area mt-4 "><img id="imageResult" src="{{$pregunt->image}}" alt="" class="img-fluid rounded shadow-sm mx-auto d-block "></div>
                                
                                    </div>

                                    <div class="col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Seleccione la categoría de la pregunta:</label>
                                            <select class="form-control" name="category" id="">
                                              <option value="urgente" {{ $pregunt->category == 'urgente' ? 'selected' : ''}}>Urgente</option>
                                              <option value="reacciona" {{ $pregunt->category == 'reacciona' ? 'selected' : ''}}>Reacciona</option>
                                              <option value="alerta" {{ $pregunt->category == 'alerta' ? 'selected' : ''}}>Alerta</option>
                                            </select>
                                        </div>
                                
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1" class="col-form-label">Editar la pregunta:</label>
                                            <textarea class="form-control" name="ask" rows="3" id="exampleFormControlTextarea1">{{$pregunt->ask}}</textarea>
                                        </div>
                                        
                                    </div>

                                    <div class="col-sm-12 mt-2">
                                        <div class="form-group">
                                            <a href="javascript:history.back()" class="btn btn-secondary" >Volver</a>
                                            <button type="submit" class="btn btn-primary">Actualizar</button>
                                        </div>
                                    </div>
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
              category: {
                required: true,
              },
            },
            messages: {
              ask: {
                required: "Por favor digite la pregunta",
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
                    var url = "{{route('questions.update')}}";

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
                                title: 'Pregunta Actualizada exitosamente.',
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
      </script>
    </x-slot>
    
</x-main-layout>