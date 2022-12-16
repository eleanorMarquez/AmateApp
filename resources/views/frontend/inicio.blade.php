@php
    function fechaCastellano ($fecha) {
        $fecha = substr($fecha, 0, 10);
        $numeroDia = date('d', strtotime($fecha));
        $dia = date('l', strtotime($fecha));
        $mes = date('F', strtotime($fecha));
        $anio = date('Y', strtotime($fecha));
        $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
        $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
        $nombredia = str_replace($dias_EN, $dias_ES, $dia);
        $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
        return $nombredia." ".$numeroDia." de ".$nombreMes." de ".$anio;
    }
@endphp
<x-main-frontend>
    <!-- title -->
    @section('title')Inicio @endsection

    <!---- CSS ----->
    <x-slot name="css">
    </x-slot>
    <!-- Extra Info End -->
    <!-- |=====|| Header End ||=================| -->
    <!-- |==========================================| -->


    <main>
        <!-- |==========================================| -->
        <!-- |=====|| Slider Start ||===============| -->
        <section class="slider1">
            <div class="slider1__wrapper">
                <div class="slider1__active owl-carousel owl-theme slider-section-dots">
                    <div
                        class="slider1__item slider1__height slider1__img-01 d-flex align-items-center justify-content-center">
                        
                    </div>
                    <div
                        class="slider1__item slider1__height slider1__img-02 d-flex align-items-center justify-content-center">
                       
                    </div>
                    <div
                        class="slider1__item slider1__height slider1__img-03 d-flex align-items-center justify-content-center">
                       
                    </div>
                </div>
            </div>
        </section>
        <!-- |=====|| Slider End ||=================| -->
        <!-- |==========================================| -->

        <!-- |==========================================| -->
        <!-- |=====|| About Start ||===============| -->
        <section class="about1">
            <div class="content_box_pot_100">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="about1__left">
                                <div class="about1__left--thumb1">
                                    <img src="{{ asset('asset/img/about/Acercade.webp') }}" alt="About">
                                </div>
                                {{-- <div class="about1__left--thumb2">
                                    <a data-fancybox="gallery_1" data-caption="Your caption will be here."
                                        href="https://youtu.be/8rPB4A3zDnQ">
                                        <img src="asset/img/png-icon/png-icon-09.png" alt="About">
                                    </a>
                                </div>
                                <div class="about1__left--thumb3">
                                    <img src="{{ asset('asset/img/about/Acercade.webp') }}" alt="About">
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="about1__wrapper">
                                <div class="title1 mb-30">
                                    <h4>Acerca de Amate</h4>
                                    <h2>¿Con qué finalidad surge <span>Amate</span>?</h2>
                                </div>
                                <div class="about1__content">
                                    <p>Se fundamenta en la necesidad de construir un grupo académico y de investigación que trabaje interdisciplinar e 
                                        interinstitucionalmente (otros semilleros – entes del estado y sociedad civil), para evidenciar el principio de CORRESPONSABILIDAD,
                                         hacia y desde la investigación y extensión atreves de estudio de causas, efectos y forma, en aras de articular para hacer pedagogía
                                          de NO VIOLENCIA INTRAFAMILIAR Y OTRAS VIOLENCIAS, aunado a generación de cultura y proyección social en la búsqueda del respeto
                                           por los valores, conocimiento y cultura del PRINCIPIO DE DIGNIDAD HUMANA en procura de la salvaguarda de los derechos humanos fundamentales.
                                        <br>AMATE solidifica sus principios dando cumplimiento a los objetivos de desarrollo sostenible propuestos que son: </p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-xl-4 col-sm-6">
                            <div class="counter1__item text-center mb-50">
                                <div class="counter1__thumb">
                                    <i class="fas fa-bullseye" style="color: #ec81e3;"></i>
                                </div>
                                <div class="counter1__content">
                                    <p class="m-0">Alianza para lograr los objetivos</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-6">
                            <div class="counter1__item text-center mb-50">
                                <div class="counter1__thumb">
                                    <i class="fas fa-venus-mars" style="color: #ec81e3;"></i>
                                </div>
                                <div class="counter1__content">
                                    <p class="m-0">Igualdad de género</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-6">
                            <div class="counter1__item text-center mb-50">
                                <div class="counter1__thumb">
                                    <i class="fas fa-balance-scale" style="color: #ec81e3;"></i>
                                </div>
                                <div class="counter1__content">
                                    <p class="m-0">Paz, justicia e instituciones sólidas</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-sm-12 text-center">
                            <div class="about1__btn">
                                <a href="{{route('contacto')}}" class="btn3"> <span>Contáctanos</span> <i
                                        class="icofont-rounded-double-right"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- |=====|| About End ||=================| -->
        <!-- |==========================================| -->

        <!-- |==========================================| -->
        <!-- |=====|| Care Start ||===============| -->
        <section class="care2">
            <div class="content_box_100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 offset-xl-2">
                            <div class="care2__wrapper text-center">
                                <div class="care2__thumb1">
                                    <span></span>
                                    <img src="{{asset('asset/img/png-icon/termometro.png') }}" alt="About Image">
                                </div>
                                <div class="care2__content mt-35">
                                    <h4>¿Quieres saber tu nivel de violencia?</h4>
                                    <h2>¡Registrate si aún no lo has hecho y completa el test!</h2>
                                    <a href="{{route('test.index')}}" class="btn3"> <span>Realizar Test</span> <i
                                            class="icofont-rounded-double-right"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- |=====|| Care End ||=================| -->
        <!-- |==========================================| -->

        <!-- |==========================================| -->
        <!-- |=====|| Blog Start ||===============| -->
        <section class="blog2">
            <div class="content_box_100">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1">
                            <div class="title2 mb-50 text-center">
                                <h4>Actualización de Noticias</h4>
                                <h2>Conoce todas las Noticias del consultorio jurídico UDES</h2>
                                <p>En la secretaría de la mujer actualizamos toda la información, <br
                                        class="d-none d-md-inline-block"> enterate de todas las estratégias, prevenciones y más.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="blog2__carousel owl-carousel owl-theme">
                                @if ($noticias_count > 0)
                                    @foreach ($noticias as $item)
                                        <div class="blog2__item">
                                            <div class="blog2__thumb">
                                                <img src="{{$item->image}}" alt="Image">
                                            </div>
                                            <div class="blog2__content">
                                                <div class="blog2__content--data">
                                                    <span><i class="far fa-user"></i>Publicada por: 
                                                        {{$item->find($item->id)->datauser->name}}</span>
                                                    <span><i class="far fa-clone"></i> AMATE</span>
                                                </div>
                                                <h3>{{$item->title}}</h3>
                                                <a href="{{route('noticiashow',$item->id)}}" class="btn3"> <span>Leer Más</span> <i
                                                    class="icofont-rounded-double-right"></i> </a>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                <div class="row text-center">
                                    <p><strong>--- No hay noticias registradas ---</strong></p>
                                </div>
                                @endif
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- |=====|| Blog End ||=================| -->
        <!-- |==========================================| -->

        <!-- |==========================================| -->
        <!-- |=====|| CTA Start ||===============| -->
        <section class="cta2">
            <h3 class="hidden">cta</h3>
            <div class="cta2__padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <p class="m-0">Contoce cuales son las principales rutas de atención.</p>
                        </div>
                        <div class="col-md-12">
                            <div class="gallery1__bottom text-center mt-50">
                                <a href="{{ route('directorios')}}" class="btn3"> <span>Ver Rutas</span> <i
                                        class="icofont-rounded-double-right"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- |=====|| CTA End ||=================| -->
        <!-- |==========================================| -->

        <!-- |==========================================| -->
        <!-- |=====|| Evwnts Start ||===============| -->
        <section class="blog2">
            <div class="content_box_100">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1">
                            <div class="title2 mb-50 text-center">
                                <h4>Actualización de Eventos</h4>
                                <h2>Conoce todos los Eventos del consultorio jurídico UDES</h2>
                                <p>En la secretaría de la mujer actualizamos toda la información, <br
                                        class="d-none d-md-inline-block"> enterate de todas las estratégias, prevenciones y más.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="blog2__carousel owl-carousel owl-theme">
                                @if ($eventos_count > 0)
                                    @foreach ($eventos as $item)
                                        <div class="blog2__item">
                                            <div class="blog2__thumb">
                                                <img src="{{$item->image}}" alt="Image">
                                                <a href="{{route('eventoshow',$item->id)}}">Fecha del Evento: {{fechaCastellano($item->date)}}</a>
                                            </div>
                                            <div class="blog2__content">
                                                <div class="blog2__content--data">
                                                    <span><i class="far fa-user"></i>Publicada por: 
                                                        {{$item->find($item->id)->datauser->name}}</span>
                                                    <span><i class="far fa-clone"></i> AMATE</span>
                                                </div>
                                                <h3>{{$item->title}}</h3>
                                                <a href="{{route('eventoshow',$item->id)}}" class="btn3"> <span>Leer Más</span> <i
                                                    class="icofont-rounded-double-right"></i> </a>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                <div class="row text-center">
                                    <p><strong>--- No hay noticias registradas ---</strong></p>
                                </div>
                                @endif
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- |=====|| Evwnts End ||=================| -->
        <!-- |==========================================| -->

        <!-- |==========================================| -->
        <!-- |=====|| Team Start ||===============| -->
        {{-- <section class="team1">
            <div class="content_box_100">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <div class="title2 mb-60 text-center">
                                <h4>Helpful Doctors</h4>
                                <h2>Advanced carefully doctors</h2>
                                <p>Why our services is best all time since 1990. desires to obtain of itself, because it
                                    is pain, but because occasionally circums tanceprocure him some great deals. </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xl-3">
                            <div class="team1__item text-center mb-50">
                                <div class="team1__thumb">
                                    <img src="assets/img/team/team-01.jpg" alt="Team">
                                </div>
                                <div class="team1__content">
                                    <h4>Dr. Rass Venors</h4>
                                    <p class="m-0">MBBS of Pathology, USA</p>
                                    <div class="team1__btn">
                                        <a href="#">Appointment</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="team1__item text-center mb-50">
                                <div class="team1__thumb">
                                    <img src="assets/img/team/team-02.jpg" alt="Team">
                                </div>
                                <div class="team1__content">
                                    <h4>Sandra T Ratliff</h4>
                                    <p class="m-0">MBBS of Pathology, USA</p>
                                    <div class="team1__btn">
                                        <a href="#">Appointment</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="team1__item text-center mb-50">
                                <div class="team1__thumb">
                                    <img src="assets/img/team/team-03.jpg" alt="Team">
                                </div>
                                <div class="team1__content">
                                    <h4>James S Henning</h4>
                                    <p class="m-0">MBBS of Pathology, USA</p>
                                    <div class="team1__btn">
                                        <a href="#">Appointment</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="team1__item text-center mb-50">
                                <div class="team1__thumb">
                                    <img src="assets/img/team/team-04.jpg" alt="Team">
                                </div>
                                <div class="team1__content">
                                    <h4>Geoffrey R Lew</h4>
                                    <p class="m-0">MBBS of Pathology, USA</p>
                                    <div class="team1__btn">
                                        <a href="#">Appointment</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <a href="doctors.html" class="btn3"> <span>See All Doctors</span> <i
                                    class="icofont-rounded-double-right"></i> </a>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- |=====|| Team End ||=================| -->
        <!-- |==========================================| -->


        <!-- |==========================================| -->
        <!-- |=====|| Care Start ||===============| -->
        {{-- <section class="care2">
            <div class="content_box_100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 offset-xl-2">
                            <div class="care2__wrapper text-center">
                                <div class="care2__thumb1">
                                    <span></span>
                                    <img src="assets/img/png-icon/png-icon-18.png" alt="About Image">
                                </div>
                                <div class="care2__content mt-35">
                                    <h4>Anything missing there? Don't worry</h4>
                                    <h2>Contact for full support</h2>
                                    <a href="contact.html" class="btn3"> <span>Take Treatment</span> <i
                                            class="icofont-rounded-double-right"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- |=====|| Care End ||=================| -->
        <!-- |==========================================| -->


        <!-- |==========================================| -->
        <!-- |=====|| Pricing Start ||===============| -->
        {{-- <section class="pricing1">
            <div class="content_box_100">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1">
                            <div class="title2 mb-60 text-center">
                                <h4>Easy Pricing Plan</h4>
                                <h2>Make life easier with comfortable pricing</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row no-gutters pricing1__row">
                        <div class="col-lg-4">
                            <div class="pricing1__item">
                                <div class="pricing1__wrapper text-center">
                                    <div class="pricing1__thumb--style">
                                        <div class="pricing1__thumb">
                                            <img src="assets/img/png-icon/png-icon-19.png" alt="Image">
                                        </div>
                                    </div>
                                    <div class="pricing1__content mt-85">
                                        <h4>Basic</h4>
                                        <p class="m-0">For a month</p>
                                        <h3>$39</h3>
                                        <ul>
                                            <li>
                                                <span class="m-0">Weekly health check-ups</span>
                                            </li>
                                            <li>
                                                <span class="m-0">Lab test system an hour</span>
                                            </li>
                                            <li>
                                                <span class="m-0">Free diet consultation</span>
                                            </li>
                                            <li>
                                                <span class="m-0">Custom exercise plans</span>
                                            </li>
                                        </ul>
                                        <a href="#" class="btn8">Get Started</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="pricing1__middle">
                                <div class="pricing1__item">
                                    <div class="pricing1__wrapper text-center">
                                        <div class="pricing1__thumb--style">
                                            <div class="pricing1__thumb">
                                                <img src="assets/img/png-icon/png-icon-19.png" alt="Image">
                                            </div>
                                        </div>
                                        <div class="pricing1__content mt-85">
                                            <h4>Standard</h4>
                                            <p class="m-0">For a month</p>
                                            <h3>$49</h3>
                                            <ul>
                                                <li>
                                                    <span class="m-0">Weekly health check-ups</span>
                                                </li>
                                                <li>
                                                    <span class="m-0">Lab test system an hour</span>
                                                </li>
                                                <li>
                                                    <span class="m-0">Free diet consultation</span>
                                                </li>
                                                <li>
                                                    <span class="m-0">Custom exercise plans</span>
                                                </li>
                                            </ul>
                                            <a href="#" class="btn3"> <span>Get Started</span> <i
                                                    class="icofont-rounded-double-right"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="pricing1__item">
                                <div class="pricing1__wrapper text-center">
                                    <div class="pricing1__thumb--style">
                                        <div class="pricing1__thumb">
                                            <img src="assets/img/png-icon/png-icon-19.png" alt="Image">
                                        </div>
                                    </div>
                                    <div class="pricing1__content mt-85">
                                        <h4>Professional</h4>
                                        <p class="m-0">For a month</p>
                                        <h3>$59</h3>
                                        <ul>
                                            <li>
                                                <span class="m-0">Weekly health check-ups</span>
                                            </li>
                                            <li>
                                                <span class="m-0">Lab test system an hour</span>
                                            </li>
                                            <li>
                                                <span class="m-0">Free diet consultation</span>
                                            </li>
                                            <li>
                                                <span class="m-0">Custom exercise plans</span>
                                            </li>
                                        </ul>
                                        <a href="#" class="btn8">Get Started</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- |=====|| Pricing End ||=================| -->
        <!-- |==========================================| -->


        <!-- |==========================================| -->
        <!-- |=====|| Blog Start ||===============| -->
        {{-- <section class="blog1 overflow-hidden">
            <div class="blog1__top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <div class="title2 text-center">
                                <h4>From Blog</h4>
                                <h2>News & blog</h2>
                                <p>We are the best medical services provider in the Worldipsum dolor sit amet,
                                    consectetur adipiscing elit, sed do eiudolore magnaveniam</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="blog1__bottom">
                <div class="blog1__wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-4 col-md-6">
                                <div class="blog1__item mb-30">
                                    <div class="blog1__thumb">
                                        <img class="img_100" src="assets/img/blog/blog-01.jpg" alt="Blog">
                                    </div>
                                    <div class="blog1__content">
                                        <div class="blog1__data">
                                            <span>
                                                <i class="far fa-user"></i>
                                                <a href="#">Post By: Rt Shuvro</a>
                                            </span>
                                            <span>
                                                <i class="far fa-clone"></i>
                                                <a href="#">Hospital</a>
                                            </span>
                                        </div>
                                        <h3><a href="#">Why we are the best in the world most popular hospital ever?</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="blog1__item mb-30">
                                    <div class="blog1__thumb">
                                        <img class="img_100" src="assets/img/blog/blog-02.jpg" alt="Blog">
                                    </div>
                                    <div class="blog1__content">
                                        <div class="blog1__data">
                                            <span>
                                                <i class="far fa-user"></i>
                                                <a href="#">Post By: Rt Shuvro</a>
                                            </span>
                                            <span>
                                                <i class="far fa-clone"></i>
                                                <a href="#">Medical</a>
                                            </span>
                                        </div>
                                        <h3><a href="#">10 best medical consulting events
                                                you can join and learn much.</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="blog1__item mb-30">
                                    <div class="blog1__thumb">
                                        <img class="img_100" src="assets/img/blog/blog-03.jpg" alt="Blog">
                                    </div>
                                    <div class="blog1__content">
                                        <div class="blog1__data">
                                            <span>
                                                <i class="far fa-user"></i>
                                                <a href="#">Post By: Rt Shuvro</a>
                                            </span>
                                            <span>
                                                <i class="far fa-clone"></i>
                                                <a href="#">Sexual</a>
                                            </span>
                                        </div>
                                        <h3><a href="#">Why we are the best in the world
                                                most popular hospital ever?</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="blog1__btn text-center">
                                    <a href="blog-2.html" class="btn8">See All Post</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- |=====|| Blog End ||=================| -->
        <!-- |==========================================| -->


        <!-- |==========================================| -->
        <!-- |=====|| Testimonial Start ||===============| -->
        {{-- <section class="testimonial1">
            <div class="testimonial1__thumb1">
                <img src="assets/img/background/bg-02.jpg" alt="Image">
                <div class="testimonial1__thumb1--btn">
                    <a data-fancybox="gallery_1" data-caption="Your caption will be here."
                        href="https://youtu.be/8rPB4A3zDnQ"><i class="far fa-play-circle"></i></a>
                </div>
            </div>
            <div class="testimonial1__thumb2">
                <img src="assets/img/background/bg-03.jpg" alt="Image">
            </div>
            <div class="testimonial1__thumb3">
                <img src="assets/img/background/bg-04.jpg" alt="Image">
            </div>
            <div class="testimonial1__padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="title2">
                                <h4>World wide Client</h4>
                                <h2>Best <span>medical &</span> <br class="d-none d-md-inline-block"> health services
                                    provider.</h2>
                            </div>
                            <div class="testimonial1__wrapper owl-carousel owl-theme slider-section-dots">
                                <div class="testimonial1__item">
                                    <p>Pleasure, but because those who do not know how to pursue pleasure rationally
                                        extremely ta sanctus est Lorem. <br> <span>- Rosalie R Ventimiglia</span></p>
                                    <ul>
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="testimonial1__item">
                                    <p>Pleasure, but because those who do not know how to pursue pleasure rationally
                                        extremely ta sanctus est Lorem. <br> <span>- Tyler M Hoagland</span></p>
                                    <ul>
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        <li><a href="#"><i class="far fa-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="testimonial1__item">
                                    <p>Pleasure, but because those who do not know how to pursue pleasure rationally
                                        extremely ta sanctus est Lorem. <br> <span>- 	Arthur M Hicks</span></p>
                                    <ul>
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="testimonial1__btn">
                                <a href="#" class="btn3"> <span>Know More About Us</span> <i
                                        class="icofont-rounded-double-right"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- |=====|| Testimonial End ||=================| -->
        <!-- |==========================================| -->


        <!-- |==========================================| -->
        <!-- |=====|| Client Start ||===============| -->
        <section class="client1">
            <h3 class="hidden">Client Section</h3>
            <div class="content_box_100">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="client1__active owl-carousel">
                                <div class="client1__item d-flex justify-content-center align-items-center">
                                    <div class="client1__thumb">
                                        <a href="#"><img src="{{asset('asset/img/client/udes.png')}}" class="imagen_responsiva_prod" alt="Client"></a>
                                    </div>
                                </div>
                                <div class="client1__item d-flex justify-content-center align-items-center">
                                    <div class="client1__thumb">
                                        <a href="#"><img src="{{asset('asset/img/client/sistemas udes.jpeg')}}" class="imagen_responsiva_prod" alt="Client"></a>
                                    </div>
                                </div>
                                <div class="client1__item d-flex justify-content-center align-items-center">
                                    <div class="client1__thumb">
                                        <a href="#"><img src="{{asset('asset/img/client/consultorio udes.png')}}" class="imagen_responsiva_prod" alt="Client"></a>
                                    </div>
                                </div>
                                <div class="client1__item d-flex justify-content-center align-items-center">
                                    <div class="client1__thumb">
                                        <a href="#"><img src="{{asset('asset/img/client/semanvi.jpeg')}}" class="imagen_responsiva_prod" alt="Client"></a>
                                    </div>
                                </div>
                                <div class="client1__item d-flex justify-content-center align-items-center">
                                    <div class="client1__thumb">
                                        <a href="#"><img src="{{asset('asset/img/client/derecho.png')}}" class="imagen_responsiva_prod" alt="Client"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- |=====|| Client End ||=================| -->
        <!-- |==========================================| -->


        <!-- |==========================================| -->
        <!-- |=====|| Appointment Start ||===============| -->
        {{-- <section class="appointment2">
            <div class="content_box_100_70">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-md-6">
                            <div class="appointment2__item mb-30">
                                <div class="appointment2__thumb-wrapper">
                                    <div class="appointment2__thumb">
                                        <i class="flaticon-address"></i>
                                    </div>
                                </div>
                                <div class="appointment2__content">
                                    <h4>Our Main Hospital</h4>
                                    <p class="m-0">123 road, California, USA</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="appointment2__item mb-30">
                                <div class="appointment2__thumb-wrapper">
                                    <div class="appointment2__thumb">
                                        <i class="flaticon-landline"></i>
                                    </div>
                                </div>
                                <div class="appointment2__content">
                                    <h4>Our Main Hospital</h4>
                                    <p class="m-0">123 road, California, USA</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="appointment2__item mb-30">
                                <div class="appointment2__thumb-wrapper">
                                    <div class="appointment2__thumb">
                                        <i class="flaticon-doctor-1"></i>
                                    </div>
                                </div>
                                <div class="appointment2__content">
                                    <h4>Our Main Hospital</h4>
                                    <p class="m-0">123 road, California, USA</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- |=====|| Appointment End ||=================| -->
        <!-- |==========================================| -->


        <!-- |==========================================| -->
        <!-- |=====|| Contact Start ||===============| -->
        {{-- <section class="contact1">
            <div class="content_box_100">
                <div class="container">
                    <div class="row no-gutters">
                        <div class="col-lg-5">
                            <div class="contact1__info text-center">
                                <div class="contact1__thumb-wrapper">
                                    <div class="contact1__thumb">
                                        <img src="assets/img/png-icon/png-icon-20.png" alt="Image">
                                    </div>
                                </div>
                                <h3>Emergency call</h3>
                                <h4>+273-649300</h4>
                                <p class="m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. cumsan lacus vel facilisis. </p>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="contact_page2__form">
                                <h3>Get appointment</h3>
                                <form id="contact-form" action="assets/php/mail.php" method="POST">
                                    <div class="row mb-20">
                                        <div class="col-xl-6">
                                            <input class="form-control" type="text" name="name"
                                                placeholder="Full name *" required>
                                        </div>
                                        <div class="col-xl-6">
                                            <input class="form-control" type="text" name="phone-number"
                                                placeholder="Your phone *">
                                        </div>
                                        <div class="col-xl-12">
                                            <input class="form-control" type="text" name="subject"
                                                placeholder="I’m interested in *">
                                        </div>
                                        <div class="col-xl-12">
                                            <input class="form-control" type="email" name="email"
                                                placeholder="Your email *" required>
                                        </div>
                                        <div class="col-xl-12">
                                            <button type="submit" class="btn8">Send Us</button>
                                        </div>
                                    </div>
                                    <p class="form-message"></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- |=====|| Contact End ||=================| -->
        <!-- |==========================================| -->
    </main>
    
    {{-- {!! NoCaptcha::renderJs() !!} --}}
    <x-slot name="js">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      

    </x-slot>

</x-main-frontend>
