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
           @php
               $m = $menu->where('widget', 'index');
               $name = "";
               foreach ($m as $k) {
                   $name = $k->getTranslatedAttribute('name');
               }
               
           @endphp
           <h2>{{ $name }}</h2>
           <div class="heading-line"></div>
        </div>
    </div>
</section>
@php
    $index = 0;
@endphp
<section id="gallery" class="gallery_section bg-grey bd-bottom padding">
    <div class="container">
        <ul class="gallery_filter mb-30">
            <li class="active" data-filter="*">{{ setting('site.gallery_category_' . Session::get('locale')) }}</li>
            @foreach ($categories as $item)
                <li data-filter=".{{ $item->fliter }}">{{ $item->getTranslatedAttribute('name') }}</li>   
            @endforeach
        </ul><!-- /.portfolio_filter -->
        <ul class="portfolio_items row">
            @for ($i = 0, $j = 0; $j < floor(count($images) / 3); $i += 3, $j++, $index++)
                @if ($index % 2 == 0)
                    <li class="col-lg-6 col-md-6 padding-15 single_item {{ $images[$i]->filter->getTranslatedAttribute('fliter') }}">
                        <figure class="portfolio_item">
                            <img src="{{ asset('storage/' . $images[$i]->image) }}" alt="Portfolio Item">
                            <figcaption class="overlay">
                                <a href="{{ asset('storage/' . $images[$i]->image) }}" class="img_popup"></a>
                            </figcaption>
                        </figure>
                    </li>
                    <li class="col-lg-3 col-md-6 padding-15 single_item {{ $images[$i+1]->filter->getTranslatedAttribute('fliter') }}">
                		<figure class="portfolio_item">
                			<img style="" src="{{ asset('storage/' . $images[$i+1]->image) }}" alt="Portfolio Item">
                			<figcaption class="overlay">
                				<a href="{{ asset('storage/' . $images[$i+1]->image) }}" class="img_popup"></a>
                			</figcaption>
                		</figure>
                	</li>
                	<li class="col-lg-3 col-md-6 padding-15 single_item {{ $images[$i+2]->filter->getTranslatedAttribute('fliter') }}">
                		<figure class="portfolio_item">
                			<img src="{{ asset('storage/' . $images[$i+2]->image) }}" alt="Portfolio Item">
                			<figcaption class="overlay">
                				<a href="{{ asset('storage/' . $images[$i+2]->image) }}" class="img_popup"></a>
                			</figcaption>
                		</figure>
                	</li>
                @else
                <li class="col-lg-3 col-md-6 padding-15 single_item {{ $images[$i]->filter->getTranslatedAttribute('fliter') }}">
                    <figure class="portfolio_item">
                        <img src="{{ asset('storage/' . $images[$i]->image) }}" alt="Portfolio Item">
                        <figcaption class="overlay">
                            <a href="{{ asset('storage/' . $images[$i]->image) }}" class="img_popup"></a>
                        </figcaption>
                    </figure>
                </li>
                <li class="col-lg-3 col-md-6 padding-15 single_item {{ $images[$i+1]->filter->getTranslatedAttribute('fliter') }}">
                    <figure class="portfolio_item">
                        <img src="{{ asset('storage/' . $images[$i+1]->image) }}" alt="Portfolio Item">
                        <figcaption class="overlay">
                            <a href="{{ asset('storage/' . $images[$i+1]->image) }}" class="img_popup"></a>
                        </figcaption>
                    </figure>
                </li>
                <li class="col-lg-6 col-md-6 padding-15 single_item {{ $images[$i+2]->filter->getTranslatedAttribute('fliter') }}">
                    <figure class="portfolio_item">
                        <img src="{{ asset('storage/' . $images[$i+2]->image) }}" alt="Portfolio Item">
                        <figcaption class="overlay">
                            <a href="{{ asset('storage/' . $images[$i+2]->image) }}" class="img_popup"></a>
                        </figcaption>
                    </figure>
                </li>
                @endif
            @endfor
            
        
            
            
        </ul><!-- /.portfolio_items -->
    </div>
</section>
@endsection