@extends('layouts.userPagesLayout')

@section('content')



<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            @foreach ($aboutUs as $item)

            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="position-relative overflow-hidden ps-5 pt-5 h-100" style="min-height: 400px;">
                    <img class="position-absolute w-100 h-100" src="{{ asset('images/' . $item->image) }}" alt="" style="object-fit: cover;">
                    <div class="position-absolute top-0 start-0 bg-white pe-3 pb-3" style="width: 200px; height: 200px;">
                        <div class="d-flex flex-column justify-content-center text-center bg-primary h-100 p-3">
                            <h1 class="text-white">{{$item->number}}</h1>
                            <h2 class="text-white">Years</h2>
                            <h5 class="text-white mb-0">Experience</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="h-100">
                    <div class="border-start border-5 border-primary ps-4 mb-5">
                        <h6 class="text-body text-uppercase mb-2">About Us</h6>
                        <h1 class="display-6 mb-0">{{$item->title}}</h1>
                    </div>
                    <p>{{$item->text}}</p>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                    <div class="border-top mt-4 pt-4">
                        <div class="row g-4">
                            <div class="col-sm-4 d-flex wow fadeIn" data-wow-delay="0.1s">
                                <i class="fa fa-check fa-2x text-primary flex-shrink-0 me-3"></i>
                                <h6 class="mb-0">Ontime at services</h6>
                            </div>
                            <div class="col-sm-4 d-flex wow fadeIn" data-wow-delay="0.3s">
                                <i class="fa fa-check fa-2x text-primary flex-shrink-0 me-3"></i>
                                <h6 class="mb-0">24/7 hours services</h6>
                            </div>
                            <div class="col-sm-4 d-flex wow fadeIn" data-wow-delay="0.5s">
                                <i class="fa fa-check fa-2x text-primary flex-shrink-0 me-3"></i>
                                <h6 class="mb-0">Verified professionals</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>



@endsection
