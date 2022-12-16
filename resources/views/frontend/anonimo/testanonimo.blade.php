<x-main-frontend>
    <!-- title -->
    @section('title')Test Anónimo @endsection
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
                                <h2>Test Anónimo</h2>
                            </div>
                        </div>
                        @if (Session::has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-times"></i> {{ Session::get('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        
                        @if (Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fas fa-times"></i> {{ Session::get('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
                    <div class="contact_page1__form">
                        <form method="POST" action="{{ route('test_anonimo.store') }}" id="quickForm">
                            @csrf
    
                            <div class="row">
                                <div class="col-sm-12">
                                    @include('frontend.include.formtest')
                                </div>
                                
                                
                              </div>
                            <div class="row">
                                <div class="col clearfix mt-2 mb-2">
                                    <button type="submit" class="btn2">{{ __('Enviar') }}<i class="icofont-rounded-double-right"></i></button>
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
            $(function () {
            });
            
        </script>
    </x-slot>

</x-main-frontend>
