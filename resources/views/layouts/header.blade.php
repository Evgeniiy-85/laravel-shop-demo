<header>
    <div class="header-top">
        <nav id="w0" class="navbar navbar-expand-md navbar-white bg-white">
            <div class="container">
                <div class="header-center">
                    <div id="w0-collapse" class="collapse navbar-collapse">
                        <ul id="w1" class="navbar-nav nav">
                            <li class="nav-item">
                                <a href="#">&nbsp</a>
                            </li>
                            <li class="nav-item">
                                <a href="#">&nbsp</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <div class="header-bottom bg-white">
        <div class="container">
            <div class="header-left">
                <a class="logo-wrap" href="/">
                    <img src="{{ $settings->logo_url }}">
                </a>

                @if(1)
                    <div class="catalog-menu-wrap">
                        <a href="/catalog" class="catalog-menu">Каталог</a>
                    </div>
                @endif
            </div>

            @if(1)
                <div class="header-center">
                    <div class="search-wrap">
                        <div class="search">
                            <form id="form-search" action="/search" method="get">
                                <div class="input-group">
                                    <input type="text" name="q" placeholder="Поиск по сайту" value="{{ request()->input('q') }}">
                                    <div class="search__controls">
                                        <span class="search__icon-clear"><i class="icon"></i></span>
                                        <span class="search__icon-search"><i class="icon"></i></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endif

            <div class="header-right">
                <div class="header-buttons">
                    @if(1)
                        <div class="btn-wrap">
                            <a href="/favorites" class="btn-favourites">
                                <i class="btn-icon"></i>
                                <span class="btn-title">Избранное</span>
                            </a>
                        </div>

                        <div class="btn-wrap">
                            <a href="/cart" class="btn-cart">
                                <i class="btn-icon"></i>
                                <i class="count-products-icon hidden"></i>
                                <span class="btn-title">
                                    <span>Корзина</span>
                                </span>
                            </a>
                            @include('cart.cart_modal')
                        </div>
                    @endif

                    @if(!Auth::check())
                        <div class="btn-wrap">
                            <a href="{{ route('login') }}" class="btn-login">
                                <i class="btn-icon"></i>
                                <span class="btn-title">Войти</span>
                            </a>
                        </div>
                    @else
                        <div class="btn-wrap user-profile__container">
                            <a href="{{ route('logout') }}" class="btn-logout">
                                <svg class="user-profile__level" width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill="#ddd" d="M24 0V2.00204C27.8746 2.18368 31.4746 3.41533 34.5218 5.41884L35.6987 3.79902C32.3195 1.55719 28.3136 0.184532 24 0Z"></path><path fill="#ddd" d="M36.1719 6.62223C39.0553 8.94719 41.3113 12.019 42.6459 15.5438L44.5505 14.9249C43.0764 10.982 40.5511 7.55205 37.3158 4.97588L36.7536 5.74965L36.1719 6.62223Z"></path><path fill="#ddd" d="M44 22.9787C44 24.8935 43.7437 26.7484 43.2636 28.5111L45.1682 29.1299C45.7103 27.172 46 25.1091 46 22.9787C46 20.8481 45.7103 18.7852 45.1682 16.8271L43.2635 17.446C43.7437 19.2087 44 21.0638 44 22.9787Z"></path><path fill="#ddd" d="M42.646 30.4133C41.3063 33.9516 39.0382 37.0334 36.139 39.3615L37.3159 40.9813C40.5512 38.4051 43.0765 34.9751 44.5506 31.0322L42.646 30.4133Z"></path><path fill="#ddd" d="M34.5219 40.5384C31.4746 42.5419 27.8746 43.7736 24 43.9553V45.9573C28.3137 45.7728 32.3196 44.4001 35.6988 42.1582L34.5219 40.5384Z"></path><path fill="#ddd" d="M22 43.9553C18.1254 43.7736 14.5254 42.542 11.4781 40.5384L10.3012 42.1582C13.6805 44.4001 17.6864 45.7728 22 45.9573V43.9553Z"></path><path fill="#ddd" d="M9.861 39.3615C6.96184 37.0334 4.69376 33.9516 3.35407 30.4134L1.44945 31.0323C2.92358 34.9752 5.44879 38.4052 8.68413 40.9813L9.861 39.3615Z"></path><path fill="#ddd" d="M2 22.9787C2 21.0638 2.2563 19.2087 2.73646 17.446L0.831849 16.8271C0.289697 18.7852 0 20.8481 0 22.9787C0 25.1091 0.289675 27.172 0.831787 29.1299L2.7364 28.5111C2.25628 26.7484 2 24.8935 2 22.9787Z"></path><path fill="#ddd" d="M3.35411 15.5438C4.69383 12.0056 6.96192 8.92379 9.86111 6.5957L8.68424 4.97588C5.44888 7.55205 2.92365 10.982 1.44949 14.9249L3.35411 15.5438Z"></path><path fill="#ddd" d="M10.3013 3.79901C13.6805 1.55718 17.6864 0.184532 22 0V2.00204C18.1254 2.18368 14.5255 3.41532 11.4782 5.41883L10.3013 3.79901Z"></path><foreignObject x="4" y="4" width="38" height="38">
                                    <img class="user-profile__avatar" alt="avatar" src="{{ asset('images/avatar.png') }}"></foreignObject>
                                </svg>
                                <span class="btn-title">Выйти</span>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>
