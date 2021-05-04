@extends('includes.main')
@section('title')
    <meta name="description"
        content="BarberShop & Hair Salon HTML Template, {{ $seo->getTranslatedAttribute('seo_description') }}">
    <meta name="author" content="DynamicLayers">
    <meta name="keywords" content="{{ $seo->getTranslatedAttribute('seo_keywords') }}">
    <title>{{ $seo->getTranslatedAttribute('seo_title') }}</title>
@endsection
@section('content')
<section class="page_header d-flex align-items-center">
    <div class="container">
        <div class="section_heading text-center mb-40 wow fadeInUp" data-wow-delay="300ms">
           <h3>Fred Massimo</h3>
           <h2>{{ $seo->getTranslatedAttribute("panel_text") }}</h2>
           <div class="heading-line"></div>
        </div>
    </div>
</section>	
<section class="service_section bg-grey padding">
    <div class="container">
    <div class="section_heading text-center mb-40 wow fadeInUp" data-wow-delay="300ms">
           <h3>Fred Masimo | BarberShop</h3>
           <h2>{{ $seo->getTranslatedAttribute("features_title") }}</h2>
           <div class="heading-line"></div>
        </div>
        <div class="row">
            @foreach ($services as $item)
                <div class="col-lg-3 col-md-6 padding-15 wow fadeInUp" data-wow-delay="200ms">
                    <div class="service_box">
                        <i class="{{ $item->icon_class }}"></i>
                        <h3>{{ $item->getTranslatedAttribute("title") }}</h3>
                        {!! $item->getTranslatedAttribute("content") !!}
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</section>

    <!-- /.footer_section -->

@endsection
