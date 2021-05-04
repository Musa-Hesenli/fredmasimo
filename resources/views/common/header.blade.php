<header id="header" class="header-section">
    <div class="container">
        <nav class="navbar ">
            @php
                $slug = $menu->where('widget', 'index');
                $url = '';
                foreach ($slug as $s) {
                    $url = $s->getTranslatedAttribute('slug');
                }
            @endphp
            <a href="{{ url($url) }}" class="navbar-brand"><img src="{{ asset('img/1Artboard 1.svg') }}"
                    alt="Barbershop"></a>
            <div class="d-flex menu-wrap align-items-center">
                <div id="mainmenu" class="mainmenu">
                    <ul class="nav">
                        @for ($i = 0; $i < count($menu); $i++)
                            @if ($menu[$i]->widget == 'about_parent') <li><a
                            href="#">{{ $menu[$i]->getTranslatedAttribute('name') }}</a>
                            <ul>
                            @for ($j = 0; $j < 3; $j++)
                                @php
                                    $i = $i + 1;
                                @endphp
                                <li><a
                                href="{{ url($menu[$i]->getTranslatedAttribute('slug')) }}">{{ $menu[$i]->getTranslatedAttribute('name') }}</a></li> @endfor
                    </ul>
                    </li>
                @else
                    <li><a data-scroll class="nav-link active"
                            href="{{ url($menu[$i]->getTranslatedAttribute('slug')) }}">{{ $menu[$i]->getTranslatedAttribute('name') }}</a>
                    </li>
                    @endif

                    @endfor




                    </ul>
                </div>
                <div class="header-btn">
                    @php
                        $lang = Session::get('locale');
                        
                    @endphp
                    @if ($lang === 'pl')
                        <a href="#en" class="menu-btn">English</a>
                    @else
                        <a href="#pl" class="menu-btn">Polski</a>
                    @endif
                </div>
            </div>
        </nav>
    </div>
</header>
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
    integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $('.menu-btn').click(function() {
        let lang = $(this).attr('href').replace("#", "");
        let url = window.location.href;
        $.ajax({
            url: "/lang",
            method: "GET",
            data: {
                lang: lang,
                url: url,
            },
            success: function(data) {
                //console.log(data);
                window.location.replace(data);
            }
        });
    });

</script>
<!--.header-section -->
<script src="//code.jivosite.com/widget/T23WpVMXQg" async></script>
