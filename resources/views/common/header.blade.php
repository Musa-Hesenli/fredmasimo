<header id="header" class="header-section">
    <div class="container">
    <nav class="navbar ">
            <a href="index-en.php" class="navbar-brand"><img src="{{ asset('img/1Artboard 1.svg') }}"  alt="Barbershop"></a>
            <div class="d-flex menu-wrap align-items-center">
               <div id="mainmenu" class="mainmenu">
                   <ul class="nav">
                       @for ($i = 0; $i < count($menu); $i++)
                            @if ($menu[$i]->widget == 'about_parent')
                            <li><a href="#">{{ $menu[$i]->getTranslatedAttribute('name') }}</a>
                                <ul>
                                    @for ($j = 0; $j < 3; $j++)
                                        @php
                                            $i = $i + 1;
                                        @endphp
                                        <li><a href="{{ $menu[$i]->getTranslatedAttribute('slug') }}">{{ $menu[$i]->getTranslatedAttribute('name') }}</a></li>
                                    @endfor
                                </ul>
                            </li>
                            @else
                                <li><a data-scroll class="nav-link active" href="{{ $menu[$i]->getTranslatedAttribute('slug') }}">{{ $menu[$i]->getTranslatedAttribute('name') }}</a></li> 
                            @endif
                           
                       @endfor
                       
                        
                        
                        {{-- <li><a href="products.php">Products</a></li>
                        <li><a href="pricelist.php">Price LIST</a></li>
                        <li><a href="https://booksy.com/en-pl/79738_fred-masimo-barbershop_barber-shop_3_warszawa" target="_blank">Make Appointment</a></li>
                        <!-- <li><a href="blogs.php">Blog</a></li> -->
                        <li><a href="contact.php">Contacts</a></li> --}}
                    </ul>
               </div>
               <div class="header-btn">
                   <a href="index.php" class="menu-btn">English</a>
               </div>
            </div>
        </nav>
    </div>
</header>
 <!--.header-section -->
 <script src="//code.jivosite.com/widget/T23WpVMXQg" async></script>
 

