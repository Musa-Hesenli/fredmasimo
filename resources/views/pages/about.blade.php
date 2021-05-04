@extends('includes.main')
@section('title')
    <meta name="description"
        content="BarberShop & Hair Salon HTML Template, {{ $seo->getTranslatedAttribute('seo_description') }}">
    <meta name="author" content="DynamicLayers">
    <meta name="keywords" content="{{ $seo->getTranslatedAttribute('seo_keywords') }}">
    <title>{{ $seo->getTranslatedAttribute('seo_title') }}</title>
@endsection
@section('content')
<section class="page_header d-flex align-items-center" style="background-image: url({{ asset('storage/' . $seo->panel_image) }})">
    <div class="container">
        <div class="section_heading text-center mb-40 wow fadeInUp" data-wow-delay="300ms">
           <h3>Fred Massimo</h3>
           <h2>{{ $seo->getTranslatedAttribute("panel_text") }}</h2>
           <div class="heading-line"></div>
        </div>
    </div>
</section>
<section id="about" class="about_section bd-bottom padding">
    <div class="container">
       <div class="row">
           <div class="col-md-6">
                <div class="about_content align-center">
                     <h2 class="wow fadeInUp" data-wow-delay="200ms">{{ $home_seo->getTranslatedAttribute("about_section_start_text") }}</h2>
                    <img class="wow fadeInUp" data-wow-delay="500ms" src="{{ asset('img/about-logo.png') }}" alt="logo">
                    {!! $seo->getTranslatedAttribute("about_text") !!}
                </div>        
            </div>
            <div class="col-md-6 d-none d-md-block">
                <div class="about_img">
                    <img src="{{ asset('img/about-1.jpg') }}" alt="idea-images" class="about_img_1 wow fadeInLeft" data-wow-delay="200ms">
                    <img src="{{ asset('img/about-2.jpg') }}" alt="idea-images" class="about_img_2 wow fadeInRight" data-wow-delay="400ms">
                    <img src="{{ asset('img/about-3.jpg') }}" alt="idea-images" class="about_img_3 wow fadeInLeft" data-wow-delay="600ms">
                </div>
            </div>
       </div>
    </div>
</section>


<section class="service_section bg-grey padding">
    <div class="container">
    <div class="section_heading text-center mb-40 wow fadeInUp" data-wow-delay="300ms">
           <h3>{{ $home_seo->getTranslatedAttribute("about_section_start_text") }}</h3>
           <h2>{{ $home_seo->getTranslatedAttribute('services_title') }}</h2>
           <div class="heading-line"></div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 padding-15 wow fadeInUp" data-wow-delay="200ms">
                <div class="service_box">
                    <i class="bs bs-scissors-1"></i>
                    <h3>{{ $home_seo->getTranslatedAttribute('service_title_1') }}</h3>
                    {!! $home_seo->getTranslatedAttribute('service_content_1') !!}
                </div>
            </div>
            <div class="col-lg-3 col-md-6 padding-15 wow fadeInUp" data-wow-delay="300ms">
                <div class="service_box">
                    <i class="bs bs-razor"></i>
                    <h3>{{ $home_seo->getTranslatedAttribute('service_title_2') }}</h3>
                    {!! $home_seo->getTranslatedAttribute('service_content_2') !!}
                </div>
            </div>
            <div class="col-lg-3 col-md-6 padding-15 wow fadeInUp" data-wow-delay="700ms">
                <div class="service_box">
                <img src="{{ asset('img/icons/father.svg') }}" style="padding-bottom: 20px;">
                    <h3 class="about-tittle">{{ $home_seo->getTranslatedAttribute('service_title_3') }}</h3>
                    {!! $home_seo->getTranslatedAttribute('service_content_3') !!}
                </div>
            </div>
            <div class="col-lg-3 col-md-6 padding-15 wow fadeInUp" data-wow-delay="500ms">
                <div class="service_box">
                <img src="{{ asset('img/icons/crown.svg') }}" style="padding-bottom: 20px;">
                    <h3>{{ $home_seo->getTranslatedAttribute('service_title_4') }}</h3>
                    {!! $home_seo->getTranslatedAttribute('service_content_4') !!}
                </div>
            </div>
            </div>
    </div>
</section><!--/. service_section -->

<section id="team" class="team_section bd-bottom padding">
    <div class="container">
        <div class="section_heading text-center mb-40 wow fadeInUp" data-wow-delay="300ms">
           <h3>{{ $seo->getTranslatedAttribute("barbers_first_title") }}</h3>
           <h2>{{ $seo->getTranslatedAttribute("barbers_title") }}</h2>
           <div class="heading-line"></div>
        </div>
        <ul class="team_members row"  style="display: flex; justify-content: center;">
            @foreach ($barbers as $item)
            <li class="col-lg-3 col-md-6 sm-padding wow fadeInUp" data-wow-delay="200ms">
                <div class="team_member">
                    <img src="{{ asset('storage/' . $item->image) }}" alt="Team Member">
                    <div class="overlay">
                        <h3>{{ $item->name }}</h3>
                        <p>{{ $item->getTranslatedAttribute('profession') }}</p>
                    </div>
                </div>
            </li>
            @endforeach
            
        </ul><!-- /.team_members -->
    </div>
</section><!-- /.team_section -->
@endsection
