@extends('layouts.userPagesLayout')

@section("content")

{{-- @section('title',"Add") --}}



<div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($HomePage as $key => $item)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img class="w-100" style="height: 600px;" src="images/{{ $item->image }}" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-12 col-lg-10">
                                    <h5 class="text-light text-uppercase mb-3 animated slideInDown">WELCOME TO GHS</h5>
                                    <h1 class="display-2 text-light mb-3 animated slideInDown">{{ $item->text }}</h1>
                                    <ol class="breadcrumb mb-4 pb-2">
                                        <li class="breadcrumb-item fs-5 text-light">Nursemaid</li>
                                        <li class="breadcrumb-item fs-5 text-light">Cleaning lady</li>
                                        <li class="breadcrumb-item fs-5 text-light">Chief</li>
                                    </ol>
                                    <a href="#service" class="btn btn-primary py-3 px-5">More Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<!-- Carousel End -->

<!-- Service Start -->
<div id='service' class="container-xxl py-5">
    <div class="container">
    <div class="row g-4 justify-content-center">
           <!-- Service Start -->
           <div class="container-xxl py-5">
            <div class="container">
                @foreach ($services as $service)
                    <div  class="row g-5 align-items-end mb-5" style="margin-top: 10px">
                        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="border-start border-5 border-primary ps-4">
                                <h6 class="text-body text-uppercase mb-2">{{ $service->name }}</h6>
                                <h4 class="display-10 mb-0">{{ $service->description }}</h4>
                            </div>
                        </div>
                    </div>

                    <!-- Categories Section -->
                    <div class="row g-4 justify-content-center">
                        @foreach ($service->categories as $category)
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="service-item bg-light overflow-hidden h-100">
                                    <img class="img-fluid" src="{{ asset('images/' . $category->image) }}" alt="">
                                    <div class="service-text position-relative text-center h-100 p-4">
                                        <h5 class="mb-3">{{ $category->name }}</h5>
                                        <a class="small" href="{{ route('user.showWorker',$category) }}">READ MORE<i class="fa fa-arrow-right ms-3"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>


        </div>
    </div>
</div>
<!-- Service End -->


@endsection
