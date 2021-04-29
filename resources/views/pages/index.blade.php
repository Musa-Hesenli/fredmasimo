@extends('includes.main')
@section('content')
<section class="slider_section">
    <ul id="main-slider" class="owl-carousel main_slider">
        @foreach ($sliders as $item)
        <li class="main_slide d-flex align-items-center" style="background-image: url({{ asset("storage/" .  $item->image) }});">
            <div class="container">
                <div class="slider_content">
                    {!! $item->getTranslatedAttribute('first_title') !!}
                    {!! $item->getTranslatedAttribute('main_title') !!}
                    {!! $item->getTranslatedAttribute('second_title') !!}
                    <a href="https://booksy.com/ru-pl/79738_fred-masimo-barbershop_barber-shop_3_warszawa" target="_blank"  class="default_btn">{{ $home_seo->getTranslatedAttribute('slider_button') }}</a>
                </div>
            </div>
        </li>
        @endforeach
            
           
    </ul>
</section>
<!-- /.slider_section -->
<section class="about_section bd-bottom padding">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-md-6 xs-padding wow fadeInLeft" data-wow-delay="300ms">
                <div class="section_heading">
                    <h3>{{ $home_seo->getTranslatedAttribute('about_section_start_text') }}</h3>
                    {!! $home_seo->getTranslatedAttribute("about_section_title") !!}
                    {!! $home_seo->getTranslatedAttribute('about_section_description') !!}
                </div>
            </div>
            <div class="col-md-6 xs-padding wow fadeInRight" data-wow-delay="300ms">
                <div class="about_video">
                    <img src="{{ asset('img/post-1.jpg') }}" alt="img">
                    <div class="play-icon"><a href="#"><i class="ti-control-play"></i></a></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/. about_section -->

<section class="service_section bg-grey padding">
    <div class="container">
    <div class="section_heading text-center mb-40 wow fadeInUp" data-wow-delay="300ms">
        <h3>{{ $home_seo->getTranslatedAttribute('about_section_start_text') }}</h3>
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
    </div>
</section>
<section id="reviews" class="testimonial_section padding">
    <div class="container">
        <ul id="testimonial_carousel" class="testimonial_items owl-carousel">
            @foreach ($comments as $item)
            <li class="testimonial_item">
                <p>{!! $item->getTranslatedAttribute("text") !!}</p>
            </li>
            @endforeach
        </ul>
    </div>
</section>

@endsection