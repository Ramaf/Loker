@extends('layouts.master')
@section('title', 'Category')
@push('page-css')
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
     {{-- <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet"> --}}
    <!-- <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/variables.css" rel="stylesheet"> -->
    <link href="assets/css/main.css" rel="stylesheet">
@endpush
@section('content')
    <div class="container">
        <h1 style="text-align: center;">ini /LOKERRrr</h1>
        <div class="row gy-4">

            <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out">
                <div class="service-item position-relative">
                    <div class="icon"><i class="bi bi-activity icon"></i></div>
                    <h4><a href="" class="stretched-link">PERTAMA</a></h4>
                    <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
                </div>
            </div><!-- End Service Item -->

            <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="200">
                <div class="service-item position-relative">
                    <div class="icon"><i class="bi bi-bounding-box-circles icon"></i></div>
                    <h4><a href="" class="stretched-link">KEDUAAA</a></h4>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
                </div>
            </div><!-- End Service Item -->

            <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="400">
                <div class="service-item position-relative">
                    <div class="icon"><i class="bi bi-calendar4-week icon"></i></div>
                    <h4><a href="" class="stretched-link">Magni Dolores</a></h4>
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
                </div>
            </div><!-- End Service Item -->

            <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="600">
                <div class="service-item position-relative">
                    <div class="icon"><i class="bi bi-broadcast icon"></i></div>
                    <h4><a href="" class="stretched-link">Nemo Enim</a></h4>
                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
                </div>
            </div><!-- End Service Item -->
        </div>
    </div>
@endsection
