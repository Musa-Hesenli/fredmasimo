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
    @php
    $url = '';
    $slug = $menu->where('widget', 'products');
    foreach ($slug as $s) {
        $url = $s->getTranslatedAttribute('slug');
    }
    @endphp
    <section class="blog-section padding">
        <div class="container">
            <div class="blog-wrap row">
                <div class="col-lg-4 sm-padding">
                    <div class="sidebar-wrap">
                        <div class="widget-content">

                            <form action="#" method="GET" class="search-form">
                                <input type="text" class="form-control"
                                    placeholder="{{ $seo->getTranslatedAttribute('search_input_text') }}">
                                <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>

                        <div class="widget-content">
                            <h4>{{ $seo->getTranslatedAttribute('category_title') }}</h4>
                            <ul class="widget-links">
                                @foreach ($categories as $item)
                                    <li><a
                                            href="{{ url($url . '/' . $item->getTranslatedAttribute('slug')) }}">{{ $item->getTranslatedAttribute('name') }}</a>
                                    </li>
                                @endforeach

                                <li><a href="{{ url($url) }}">{{ $seo->getTranslatedAttribute('all_products') }}</a>
                                </li>
                            </ul>
                        </div>
                        <!--categories-->

                    </div>
                    <!--/.sidebar-wrap-->
                </div>
                <!--/. col-lg-4 -->
                <div class="col-lg-8 sm-padding">
                    @php
                        $button_text = $seo->getTranslatedAttribute('read_more_button');
                    @endphp
                    <div class="row blog-grid">
                        @foreach ($products as $item)
                            <div class="col-sm-6 padding-15">
                                <div class="blog-item">
                                    <div class="blog-thumb">
                                        <img src="{{ asset('storage/' . $item->image) }}" alt="post">
                                        <span class="category"><a
                                                href="{{ url($url . '/' . $item->category_data->getTranslatedAttribute('slug')) }}">{{ $item->category_data->getTranslatedAttribute('name') }}</a></span>
                                        <span class="price-right"><a>{{ $item->price }} zł</a></span>
                                    </div>
                                    <div class="blog-content">
                                        <h3><a href="#">{{ $item->getTranslatedAttribute('name') }}</a></h3>
                                        <p>{{ $item->getTranslatedAttribute('description') }}</p>
                                        <a href="product-scottish.php" class="read-more">{{ $button_text }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{-- <ul class="pagination-wrap text-center mt-30">
                    <li><a href="#"><i class="ti-arrow-left"></i></a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#" class="active">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#"><i class="ti-arrow-right"></i></a></li>
                </ul>Pagination --}}
                </div>
                <!--/. col-lg-8 -->

            </div>
            <!--/.blog-wrap-->
        </div>
    </section>
@endsection
