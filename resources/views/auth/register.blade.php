 <x-main-frontend>
    <!-- title -->
    @section('title')Registrarme @endsection
    <x-slot name="css">
    </x-slot>
  <!-- |==========================================| -->
        <!-- |=====|| Register Start ||===============| -->
        <section class="about3">
            <div class="content_box_100">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1">
                            <div class="title2 mb-60 text-center">
                                <h2>Registrarme</h2>
                            </div>
                        </div>
                    </div>
                    <div class="contact_page1__form">
                        <form method="POST" action="{{ route('register') }}" id="quickForm" novalidate>
                            @csrf
    
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombres') }}</label>
                                        
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autofocus>
            
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="lastname" class="col-md-4 col-form-label text-md-end">Apellidos</label>
                                        <input type="text" name="lastname" class="form-control" id="lastname" required autocomplete="off"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email" class="col-form-label text-md-end">{{ __('Correo Electrónico') }}</label>
                                        
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required >
                
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="identification" class="col-form-label text-md-end">Numero de identifiación</label>
                                        <input type="number" name="identification" class="form-control @error('identification') is-invalid @enderror" value="{{ old('identification') }}" id="identification" autocomplete="off"/>

                                        @error('identification')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                                        
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required >
                
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email" class="col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                                        
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" equalto="#password" required >
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="checkdiscapacity" name="checkdiscapacity">
                                        <label class="form-check-label" for="flexCheckDefault">
                                          ¿Presenta alguna Discapacidad?
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-12" id="area">
                                    <textarea class="form-control" name="discapacity" placeholder="Describa la discapacidad" style="height: 100px"></textarea>
                                </div>
                                <div class="col-sm-12 text-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="checkdtermino" name="checkdtermino" required>
                                        <label class="form-check-label" for="checkdtermino">
                                            Estoy de acuerdo con los <strong>Términos de servicio</strong> y <strong>Política de privacidad.</strong>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col clearfix mt-2 mb-2">
                                    <button type="submit" class="btn2">{{ __('Registrarme') }}<i class="icofont-rounded-double-right"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </section>
        <!-- |=====|| Register End ||=================| -->
        <!-- |==========================================| -->
     <!-- |==========================================| -->
     <x-slot name="js">
        <script src="{{asset('vendors/jquery-validation/jquery.validate.min.js')}}"></script>
        <script src="{{asset('vendors/jquery-validation/additional-methods.min.js')}}"></script>
        <script>
            $('#area').hide();
            $('#checkdiscapacity').change(function() {
                if($(this).is(":checked")) {
                    $('#area').show();
                }else{
                    $('#area').hide();
                }

                //'unchecked' event code
            });
            $(function () {
                $('#quickForm').validate({
                    rules: {
                        name: {
                        required: true,
                        },
                        lastname: {
                            required: true,
                        },
                        email: {
                            required: true,
                        },
                        identification: {
                            required: true,
                            minlength:7,
                            maxlength:10
                        },
                        password: {
                            required: true,
                            minlength:8
                        },
                        password_confirmation:{
                            required: true,
                            minlength:8
                        },
                        discapacity: {
                            required: true,
                        },
                    },
                    messages: {
                        name: {
                        required: "Ingrese el nombre",
                    },
                    lastname: {
                        required: "Ingrese el apellido",
                    },
                    email: {
                        required: "Ingrese un correo electrónico",
                        email: "Ingrese un correo electrónico válido",
                    },
                    identification: {
                        required: "Ingrese un número de identificación",
                        minlength: "Número de identificación no válido",
                        maxlength: "Número de identificación no válido",
                    },
                    password: {
                        required: "Ingrese una contraseña",
                        minlength: "Ingrese una contraseña minimo de 8 carácteres",
                    },
                    password_confirmation: {
                        required: "Repita la contraseña",
                        minlength: "Ingrese una contraseña minimo de 8 carácteres",
                        equalTo: 'Las contraseñas no son iguales'
                    },
                    discapacity: {
                        required: "Ingrese la discapacidad(es)",
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
                    }
                });
            });
            
        </script>
    </x-slot>

</x-main-frontend>
