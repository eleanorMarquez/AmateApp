<x-main-frontend>
    <!-- title -->
    @section('title'){{$noticia->title}} @endsection

    <!---- CSS ----->
    <x-slot name="css">
    </x-slot>

    <main>
        <!-- |==========================================| -->
        <!-- |=====|| Page Title Start ||===============| -->
        <section class="page_title page_title__img-04">
            <div class="page_title__padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="page_title__content">
                                <h1>Sobre esta Noticia</h1>
                                <div class="page_title__bread-crumb">
                                    <ul>
                                        <li><a href="{{route('inicio')}}">Inicio</a></li>
                                        <li><a>{{$noticia->title}}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- |=====|| Page Title End ||=================| -->
        <!-- |==========================================| -->


        <!-- |==========================================| -->
        <!-- |=====|| Blog Details Start ||===============| -->
        <section class="blog_details1">
            <div class="content_box_100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="blog_details1__wrapper">
                                <!-- Blog Details -->
                                <div class="blog_details1__content">
                                    <div class="service_details1__thumb mb-30">
                                        <img class="img_100" src="{{$noticia->image}}" alt="OilyTheme">
                                    </div>
                                    <div class="service_details1__title">
                                        <h2>{{$noticia->title}}</h2>
                                    </div>
                                    <p>{!! $noticia->description !!}</p>
                                </div>
                                <!-- Blog Comment Reply -->
                                {{-- <div class="blog_details1__reply mt-50">
                                    <div class="service_details1__title mb-40">
                                        <h2>Leave a Reply</h2>
                                    </div>
                                    <div class="comment-reply1">
                                        <form id="comment-reply1-form">
                                            <div class="row mb-20">
                                                <div class="col-lg-12">
                                                    <textarea class="form-control" name="message"
                                                        placeholder="Write your message..." cols="30" rows="7"
                                                        required></textarea>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input class="form-control" type="text" name="name"
                                                        placeholder="Full Name*" required>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input class="form-control" type="email" name="email"
                                                        placeholder="Mail Address*" required>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="checkbox-style-01">
                                                        <div class="checkbox-item">
                                                            <input type="checkbox" name="checkbox" id="checkbox-01">
                                                            <label for="checkbox-01">
                                                                <span class="checkbox-text-span">Save my Name and Email
                                                                    in this browser for the next time.</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <a href="#" class="btn3"> <span>Post Comment</span> <i
                                                            class="icofont-rounded-double-right"></i> </a>
                                                </div>
                                            </div>
                                            <p class="form-message"></p>
                                        </form>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="sidebar2">
                                <!-- Recent Post -->
                                <div class="sidebar2__recent-post">
                                    <div class="sidebar2__title">
                                        <h3>Publicaciones Recientes</h3>
                                    </div>
                                    @foreach ($lastestnoticia as $item)
                                        <div class="sidebar2__post_item mb-30">
                                            <div class="sidebar2__post_item--thumb">
                                                <img src="{{$item->image}}" alt="OilyTheme">
                                            </div>
                                            <div class="sidebar2__post_item--content">
                                                <h4><a href="{{route('noticiashow',$item->id)}}">{{$item->title}}</a></h4>
                                                <p class="m-0">{!! substr($item->description, 5, 50) !!}...</p>
                                            </div>
                                        </div>
                                    @endforeach
                                    
                                </div>
                                <!-- Questions -->
                                <div class="sidebar2__questions mt-40">
                                    <div class="sidebar2__title">
                                        <h3>¿Tiene alguna pregunta?</h3>
                                    </div>
                                    <div class="sidebar2__questions--thumb">
                                        <img class="img_100" src="{{ asset('asset/img/background/contac.png')}}" alt="OilyTheme">
                                        <div class="sidebar2__questions--btn">
                                            <a href="{{route('contacto')}}">Contáctanos</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- |=====|| Blog Details End ||=================| -->
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
    </main>

    <x-slot name="js">
    </x-slot>

</x-main-frontend>
