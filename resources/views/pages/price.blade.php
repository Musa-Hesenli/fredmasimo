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
                <h3>Fred Masimo</h3>
                <h2>{{ $seo->getTranslatedAttribute('panel_text') }}</h2>
                <div class="heading-line"></div>
            </div>
        </div>
    </section>
    <section class="pricing_section bg-grey bd-bottom padding">
        <div class="container">
            <div class="section_heading text-center mb-40 wow fadeInUp" data-wow-delay="300ms">
                <h2>{{ $seo->getTranslatedAttribute('section_title') }}</h2>
                <div class="heading-line"></div>
            </div>
            <div class="row">
                @foreach ($price_list as $item)
                    <div class="col-lg-6 col-md-6 sm-padding">
                        <div class="price_wrap">
                            <ul class="price_list">
                                <li>
                                    <h4>{{ $item->getTranslatedAttribute('title') }}</h4>
                                    <p class="p-alt">{{ $item->getTranslatedAttribute('description') }}</p>
                                    <span class="price">{{ $item->price}} zł</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
    </section>

@endsection
