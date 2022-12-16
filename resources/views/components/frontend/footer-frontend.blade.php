<!-- |==========================================| -->
    <!-- |=====|| Footer Start ||===============| -->
    <footer class="footer1">
        <div class="footer1__top">
            <div class="content_box_100_50">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="footer1__item footer1__item--01">
                                <div class="footer1__item--logo">
                                    <img src="{{ asset('asset/img/logo/amate-logo.png')}}" alt="Logo">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="footer1__item footer1__item--02">
                                <h3>Horarios</h3>
                                    <ul>
                                        <li><span>Lunes a viernes</span></li>
                                        <li><span>8:00am-11:30am |<br> 2:00pm a 5:30pm</span></li>
                                        <li><span>Sábados</span></li>
                                        <li><span>8:00am a 11:30am</span></li>
                                    </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <nav>
                                <div class="footer1__item footer1__item--03">
                                    <h3>Ubicación</h3>
                                    <ul>
                                        <li><span>Avenida 4 Esquina Calle 10 Norte -61 </span></li>
                                        <li><span>Urbanizacion El Bosque</span></li>
                                        <li><span>+(57) 3213039424</span></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="footer1__item footer1__item--04">
                                <h3>Amate</h3>
                                    <ul>
                                        <li><a href="{{route('directorios')}}">Rutas de Atención</a></li>
                                        <li><a href="{{route('noticias')}}">Noticias</a></li>
                                        <li><a href="{{route('eventosindex')}}">Eventos</a></li>
                                        <li><a href="{{route('contacto')}}">Contáctenos</a></li>
                                    </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer1__bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="footer1__social text-center text-lg-left">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="footer1__copyright text-center text-lg-right">
                            <p class="m-0">@ 2022 <a href="{{route('inicio')}}"
                                    target="_blank">AMATE</a> Todos los derechos reservados</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- |=====|| Footer End ||=================| -->
    <!-- |==========================================| -->

    <!--CÓDIGO CON EL LINK DE WHATSAPP API-->
<a href="https://api.whatsapp.com/send?phone=573213039424&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20Amate" class="floatWapp" target="_blank">
    <i class="fab fa-whatsapp my-floatWapp"></i>
    </a>