<x-main-frontend>
    <!-- title -->
    @section('title')Directorio @endsection

    <!---- CSS ----->
    <x-slot name="css">
    </x-slot>

    <main>
        <!-- |==========================================| -->
        <!-- |=====|| Page Title Start ||===============| -->
        <section class="page_title page_title__img-05">
            <div class="page_title__padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="page_title__content">
                                <h1>Listado de Rutas</h1>
                                <div class="page_title__bread-crumb">
                                    <ul>
                                        <li><a href="{{route('inicio')}}">Inicio</a></li>
                                        <li><a>Rutas de Atención</a></li>
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
        <!-- |=====|| Directory Start ||===============| -->
        <section class="blog2 other_page">
            <div class="content_box_100">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <div class="title2 mb-55 text-center">
                                <h4>Rutas de Atención</h4>
                                <h2>Descubre cada una de las rutas de atención habilitadas</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-40">
                        <div class="col-md-12">
                            <div class="service3__active owl-carousel owl-theme">
                                @if ($directorios_count > 0)
                                    @foreach ($directorios as $item)
                                        <div class="service3__item">
                                            <div class="service3__thumb">
                                                @if ($item->image != null)
                                                    <img src="{{$item->image}}" alt="Service">
                                                    <a data-fancybox="gallery_3" data-caption="My caption"
                                                    href="{{$item->image}}"><i class="icofont-plus"></i></a>
                                                @else
                                                    <img src="{{ asset('asset/img/logo/amate.png')}}" alt="Service">
                                                    <a data-fancybox="gallery_3" data-caption="My caption"
                                                    href="{{ asset('asset/img/logo/amate.png')}}"><i class="icofont-plus"></i></a>
                                                @endif
                                                
                                                
                                            </div>
                                            <div class="service3__content text-center">
                                                <h3><a href="#">{{$item->entity}}</a></h3>
                                                <p class="m-0"><strong>Área de Contácto: </strong>{{$item->area_of_contact}}</p>
                                                <p class="m-0"><strong>Teléfono: </strong>{{$item->phones}}</p>
                                                <p class="m-0"><strong>Dirección: </strong>{{$item->ubication}}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="row text-center">
                                        <p><strong>--- No hay rutas de atención registrados ---</strong></p>
                                    </div>
                                @endif
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- |=====|| Directory End ||=================| -->
        <!-- |==========================================| -->

        <!-- |==========================================| -->
        <!-- |=====|| Client Start ||===============| -->
        {{-- <section class="client1 home3">
            <h3 class="hidden">Client Section</h3>
            <div class="content_box_100">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="client1__active owl-carousel">
                                <div class="client1__item d-flex justify-content-center align-items-center">
                                    <div class="client1__thumb">
                                        <a href="#"><img src="assets/img/client/client-01.png" alt="Client"></a>
                                    </div>
                                </div>
                                <div class="client1__item d-flex justify-content-center align-items-center">
                                    <div class="client1__thumb">
                                        <a href="#"><img src="assets/img/client/client-02.png" alt="Client"></a>
                                    </div>
                                </div>
                                <div class="client1__item d-flex justify-content-center align-items-center">
                                    <div class="client1__thumb">
                                        <a href="#"><img src="assets/img/client/client-03.png" alt="Client"></a>
                                    </div>
                                </div>
                                <div class="client1__item d-flex justify-content-center align-items-center">
                                    <div class="client1__thumb">
                                        <a href="#"><img src="assets/img/client/client-04.png" alt="Client"></a>
                                    </div>
                                </div>
                                <div class="client1__item d-flex justify-content-center align-items-center">
                                    <div class="client1__thumb">
                                        <a href="#"><img src="assets/img/client/client-05.png" alt="Client"></a>
                                    </div>
                                </div>
                                <div class="client1__item d-flex justify-content-center align-items-center">
                                    <div class="client1__thumb">
                                        <a href="#"><img src="assets/img/client/client-02.png" alt="Client"></a>
                                    </div>
                                </div>
                                <div class="client1__item d-flex justify-content-center align-items-center">
                                    <div class="client1__thumb">
                                        <a href="#"><img src="assets/img/client/client-04.png" alt="Client"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- |=====|| Client End ||=================| -->
        <!-- |==========================================| -->
    </main>
    
    <x-slot name="js">
    </x-slot>

</x-main-frontend>
