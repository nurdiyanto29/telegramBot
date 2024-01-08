@extends('frontend.fe_layout.main')

@section('content')
    <style>
        .banner-area {
            background-image: url('{{ asset($_setting['img_header']) }}')
        }
    </style>
    <!-- start banner Area -->
    <!-- start banner Area -->
    <section class="banner-area relative about-banner" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Detail Padukuhan
                    </h1>
                    <p class="text-white link-nav"><a href="/">Beranda </a> <span class="lnr lnr-arrow-right"></span> <a
                            href="">Padukuhan {{Str::title($data->nama)}}</a></p>
                </div>
            </div>
        </div>
    </section>
    <br>
    <section class="course-mission-area pb-120">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-70 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10"></h1>
                    </div>
                </div>
            </div>
            <div class="row">
                @if (isset($data->kadus_foto))
                    @php
                        $l = strlen($data->keterangan);
                        $l >= 2950 ? ($class = 'col-md-12') : ($class = 'col-md-6');
                    @endphp
                    <div class="{{ $class }} posts-list">
                        <div class="main-img" style="text-align: center">
                            <img class="img-fluid" src="{{ image($data->kadus_foto, true)}}" alt="foto"
                                width="60%">
                        </div>
                    </div>
                    <div class="{{ $class }} accordion-left">
                        <dl class="accordion">
                            <dd>
                                {!! $data->keterangan ?? '' !!}
                            </dd>
                        </dl>
                        <!-- accordion 2 end-->
                    </div>
                @else
                    <div class="col-md-12 accordion-left">
                        <dl class="accordion">
                            <dd>
                                {!! $data->keterangan ?? '' !!}
                            </dd>
                        </dl>
                        <!-- accordion 2 end-->
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
