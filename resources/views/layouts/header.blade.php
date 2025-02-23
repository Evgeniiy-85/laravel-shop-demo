<header>
    <div class="header-top">
        <nav id="w0" class="navbar navbar-expand-md navbar-white bg-white fixed-top">
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
                    <img src="/images/icons/logo.svg">
                </a>

                @if(1)
                    <div class="catalog-menu-wrap">
                        <a href="/catalog" class="catalog-menu">Каталог</a>
                    </div>
                @endif
            </div>

            @if(1)
                <div class="header-center">
                    <div class="search">
                        <div class="search-wrap">
                            <form id="form-search" action="/search" method="get">
                                <div class="input-group">
                                    <input type="text" name="q" value="" placeholder="Поиск по сайту">
                                    <button type="submit" class="btn-search"></button>
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

                    <div class="btn-wrap">
                        <a href="" class="btn-login">
                            <i class="btn-icon"></i>
                            <span class="btn-title">Войти</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
