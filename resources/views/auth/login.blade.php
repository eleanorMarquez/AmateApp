<x-main-frontend>
    <!-- title -->
    @section('title')Iniciar Sesión @endsection
    <x-slot name="css">
    </x-slot>
  <!-- |==========================================| -->
        <!-- |=====|| Login Start ||===============| -->
        <section class="contact1">
            <div class="content_box_100">
                <div class="container">
                    <div class="row no-gutters">
                        <div class="col-lg-5 appointment1__wrapper d-flex align-items-center">
                            <img src="{{ asset('asset/img/acces.png') }}" alt="" class="img-fluid rounded mx-auto d-block">
                        </div>
                        <div class="col-lg-7">
                            <div class="contact_page2__form">
                                <h3 class="text-center">INICIAR SESIÓN</h3>
                                
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
            
                                    <div class="row mb-3">
            
                                        <div class="col-md-12">
                                            <label for="" class="text-white">Correo electrónico</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="row mb-3">
            
                                        <div class="col-md-12">
                                            <label for="" class="text-white">Contraseña</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            
                                                <label class="form-check-label text-white" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="row mb-3">
                                        <div class="col-xl-12 text-center">
                                            <button type="submit" class="btn8 ">
                                                {{ __('Login') }}
                                            </button>
            
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-xl-12">
                                            <a class="btn btn-link text-white" href="{{ route('register') }}">
                                                {{ __('¡Quiero Registrarme!') }}
                                            </a>

                                            <a class="btn btn-link text-white" href="{{ route('test_anonimo') }}">
                                                {{ __('¡Hacer Test anónimo!') }}
                                            </a>
            
                                            {{-- @if (Route::has('password.request'))
                                                <a class="btn btn-link text-white" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif --}}
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- |=====|| Login End ||=================| -->
        <!-- |==========================================| -->
     <!-- |==========================================| -->
     <x-slot name="js">
    </x-slot>

</x-main-frontend>
