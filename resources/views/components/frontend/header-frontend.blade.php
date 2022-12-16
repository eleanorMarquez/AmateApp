    <!-- |==========================================| -->
    <!-- |=====|| Preloader Start ||===============| -->
    <div class="preloader">
        <div class="preloader__content">
            <div class="preloader__wrapper">
                <div class="preloader__spinner"></div>
                <div class="preloader__txt">
                    <span data-text-preloader="A" class="letters-loading">A</span>
                    <span data-text-preloader="M" class="letters-loading">M</span>
                    <span data-text-preloader="A" class="letters-loading">A</span>
                    <span data-text-preloader="T" class="letters-loading">T</span>
                    <span data-text-preloader="E" class="letters-loading">E</span>
                </div>
            </div>
        </div>
    </div>
    <!-- |=====|| Preloader End ||=================| -->
    <!-- |==========================================| -->


    <!-- |==========================================| -->
    <!-- |=====|| Header Start ||===============| -->
    <header class="header home1">
        <!-- Header Top Start -->
        <div class="header__top1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="header__top1--left text-center text-lg-left">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Universidad de Santander.</span>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="header__top1--right text-center text-lg-right">
                            <div class="header__top1--email">
                                <i class="fas fa-envelope"></i>
                                <span>consultoriojuridico.cuc@cucuta.udes.edu.co</span>
                            </div>
                            <div class="header__top1--social">
                                <a href="#"><i class="fab fa-facebook-square"></i></a>
                                <a href="#"><i class="fab fa-twitter-square"></i></a>
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Top End -->
        <!-- Header Middle Start -->
        <div class="header__middle1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="header__logo">
                            <a href="{{route('inicio')}}"><img src="{{ asset('asset/img/logo/amate-logo.png')}}" alt="Logo"></a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-sm-6">
                        <div class="header__middle1--right text-right">
                            <div class="header__middle1--phone">
                                <i class="fas fa-phone-alt"></i>
                                <span>Teléfono: +(57) 3213039424</span>
                            </div>
                            <div class="header__middle1--clock">
                                <i class="fas fa-clock"></i>
                                <span>Atención: (Lunes - Sábado) <br></span>
                            </div>
                            <div class="header__middle1--btn">
                                {{-- <a href="{{ route('login') }}" class="btn2">Ingresar</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Middle End -->
        <!-- Header Menu Start -->
        <div class="header__menu">
            <div class="header__menu-wrapper">
                <div class="container">
                    <div class="header__menu-outer">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="header__side-nav f_right d-none d-lg-block">
                                    <ul>
                                        <li class="extra_info_btn mt-1 mb-1">
                                            <a href="{{ route('login') }}" class="btn2">Ingresar</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="main-menu">
                                    <nav id="mobile-menu">
                                        <ul>
                                            <li><a href="{{route('inicio')}}">INICIO</a></li>
                                            <li><a href="{{route('directorios')}}">DIRECTORIO</a></li>
                                            <li><a href="{{route('noticias')}}">NOTICIAS</a></li>
                                            <li><a href="{{route('eventosindex')}}">EVENTOS</a></li>
                                            <li><a href="{{route('contacto')}}">CONTÁCTO</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="mobile-menu"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Menu End -->
    </header>