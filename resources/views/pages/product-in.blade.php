@extends('includes.main')
@section('title')
    <meta name="description"
    content="BarberShop & Hair Salon HTML Template, {{ $product->getTranslatedAttribute('seo_description') }}">
    <meta name="author" content="DynamicLayers">
    <meta name="keywords" content="{{ $product->getTranslatedAttribute('seo_keywords') }}">
    <title>{{ $product->getTranslatedAttribute('seo_title') }}</title>
@endsection
@section('content')
<section class="blog-section padding">
    <div class="container">
        <div class="blog-wrap row">
            <div class="col-lg-12 sm-padding">
                <div class="blog-single-wrap">
                    <div class="blog-thumb">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="img">
                    </div>
                    <div class="blog-single-content">
                        <h2>{{ $product->getTranslatedAttribute('name') }} - {{$product->getTranslatedAttribute('price') }} zł</h2>
                        <ul class="single-post-meta">
                            <li><h4>{{ $product->getTranslatedAttribute('available_text') }}</h4></li>
                        </ul>
                       
                       <p>
                        {{ $product->getTranslatedAttribute('description') }}
                       </p>
                       
                    <div class="" style="padding-top: 20px;">
                        {!! $product->getTranslatedAttribute('ingredients') !!}      
                    </div>
                </div><!--/.blog-single-->
            </div><!--/.col-lg-8-->
            
                </div><!--/.sidebar-wrap-->
            </div><!--/.col-lg-4-->
        </div><!--/.blog-wrap-->
    </div>
</section>
@endsection