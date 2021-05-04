<section class="widget_section padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 sm-padding">
                <div class="footer_widget">
                    <img class="mb-15" src="{{ asset('img/logo.png') }}" alt="Brand">
                    <p>{{ $home_seo->getTranslatedAttribute('footer_description') }}</p>
                    <ul class="widget_social">
                        <li><a href="https://www.facebook.com/fredmasimo.barbershop" target="_blank"><i class="social_facebook"></i></a></li>
                        <li><a href="https://www.instagram.com/fredmasimo.barbershop/" target="_blank"><i class="social_instagram"></i></a></li>
                        <li><a href="https://pinterest.com/fredmasimo" target="_blank"><i class="social_pinterest"></i></a></li>
                        <li><a href="https://www.youtube.com/channel/UCqdbQaHGmqz2NwKpjDeJbPQ" target="_blank"><i class="social_youtube"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 sm-padding">
                <div class="footer_widget">
                    <h3>{{ $home_seo->getTranslatedAttribute('contact_details_title') }}</h3>
                    {!! $home_seo->getTranslatedAttribute('contact_first_text') !!}
                    <p>{{ $home_seo->getTranslatedAttribute('email_text') }}: <a href="mailto:info@fredmasimo.pl">{{ $home_seo->getTranslatedAttribute('email') }}</a> <br><a href="tel:{{ $home_seo->getTranslatedAttribute('footer_description') }}">{{ $home_seo->getTranslatedAttribute('phone') }}</a></p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 sm-padding">
                <div class="footer_widget">
                    <h3>{{ $home_seo->getTranslatedAttribute('opening_hour_title') }}</h3>
                    <ul class="opening_time">
                        {!! $home_seo->getTranslatedAttribute('opening_hour_text') !!}
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 sm-padding">
                <div class="footer_widget">
                    <h3>{{ $home_seo->getTranslatedAttribute('footer_form_title') }}</h3>
                    <div class="subscribe_form">
                        <form action="/add-subscriber" method="POST" class="subscribe_form">
                            @csrf
                            <input type="email" name="email" id="subs-email" class="form_input" placeholder="{{ $home_seo->getTranslatedAttribute('footer_email_placeholder') }}">
                            <button type="submit" class="submit">{{ $home_seo->getTranslatedAttribute('footer_send_button') }}</button>
                            <div class="clearfix"></div>
                            <div id="subscribe-result">
                                <p class="subscription-success"></p>
                                <p class="subscription-error"></p>
                            </div>
                        </form>
                    </div><!-- Subscribe Form -->
                </div>
            </div>
        </div>
    </div>
</section><!-- /.widget_section -->

<footer class="footer_section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 xs-padding">
                <div class="copyright">&copy; <script type="text/javascript"> document.write(new Date().getFullYear())</script> {{ $home_seo->getTranslatedAttribute('about_section_start_text') }}</div>
            </div>
            <div class="col-md-6 xs-padding">
                @php
                    $all_url = "";
                    $all_slug = $menu->where('widget', "all_services");
                    $all_name = "";
                    $price_list_url = "";
                    $price_list_slug = $menu->where('widget', 'price');
                    $price_list_name = "";
                    foreach ($all_slug as $value) {
                        $all_url = $value->getTranslatedAttribute('slug');
                        $all_name = $value->getTranslatedAttribute('name');
                    }
                    foreach ($price_list_slug as $s) {
                        $price_list_name = $s->getTranslatedAttribute('name');
                        $price_list_url = $s->getTranslatedAttribute('slug');
                    }
                @endphp
                <ul class="footer_social">
                    <li><a href="{{ url($all_url) }}">{{ $all_name }}</a></li>
                    <li><a href="{{ url($price_list_url) }}">{{ $price_list_name }}</a></li>
                    <li><a href="https://booksy.com/en-pl/79738_fred-masimo-barbershop_barber-shop_3_warszawa" target="_blank">{{ $home_seo->getTranslatedAttribute('slider_button') }}</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>