@extends('includes.main')
@section('title')
    <meta name="description"
        content="BarberShop & Hair Salon HTML Template, {{ $seo->getTranslatedAttribute('seo_description') }}">
    <meta name="author" content="DynamicLayers">
    <meta name="keywords" content="{{ $seo->getTranslatedAttribute('seo_keywords') }}">
    <title>{{ $seo->getTranslatedAttribute('seo_title') }}</title>
@endsection
@section('content')
    <div class="mapouter">
        <div class="gmap_canvas"><iframe width="100%" height="350" id="gmap_canvas"
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1727.46095688139!2d20.981523126012437!3d52.24340701585527!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x42e812a80608acde!2sFred%20Masimo%20Barbershop!5e0!3m2!1sru!2s!4v1611218657315!5m2!1sru!2s"
                frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a
                href="https://www.emojilib.com"></a></div>
        <style>
            .mapouter {
                position: relative;
                text-align: right;
                height: 350px;
                width: 100%;
            }
            .gmap_canvas {
                overflow: hidden;
                background: none !important;
                height: 350px;
                width: 100%;
            }

        </style>
    </div>

    <section class="contact-section padding">
        <div class="map"></div>
        <div class="container">
            <div class="contact-wrap d-flex align-items-center row">
                <div class="col-lg-6 sm-padding">
                    <div class="contact-info">
                        {!! $seo->getTranslatedAttribute('about_title') !!}
                        {!! $seo->getTranslatedAttribute('about_content') !!}
                        {!! $seo->getTranslatedAttribute('contact_info') !!}
                    </div>
                </div>
                <div class="col-lg-6 sm-padding">
                    <div class="contact-form">
                        <form action="contact.php" method="post" id="ajax_form" class="form-horizontal">
                            <div class="form-group colum-row row">
                                <div class="col-sm-6">
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Name"
                                        required>
                                </div>
                                <div class="col-sm-6">
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Email"
                                        required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <textarea id="message" name="message" cols="30" rows="5" class="form-control message"
                                        placeholder="Message" required></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <button id="submit" class="default_btn" type="submit">Send Message</button>
                                </div>
                            </div>
                            <div id="form-messages" class="alert" role="alert"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
