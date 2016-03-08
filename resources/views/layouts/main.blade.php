<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>eCommerce</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <script src="{{ asset('js/vendor/modernizr-2.6.2.min.js') }}"></script>
</head>
<body>
<!--[if lt IE 7]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to
    improve your experience.</p>
<![endif]-->

<div id="wrapper">
    <header>
        <section id="top-area">
            <p>Phone orders: 1-800-0000 | Email us: <a href="mailto:office@shop.com">office@shop.com</a></p>
        </section><!-- end top-area -->
        <section id="action-bar">
            <div id="logo">
                <a href="#"><span id="logo-accent">e</span>Commerce</a>
            </div><!-- end logo -->

            <nav class="dropdown">
                <ul>
                    <li>
                        <a href="#">Shop by Category <img src="{{ asset('img/down-arrow.gif') }}"
                                                          alt="Shop by Category"/></a>
                        <ul>
                            @foreach($catnav as $cat)
                                <li><a href="{{ route('store.category', $cat->id) }}">{{ $cat->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </nav>

            <div id="search-form">
                {!! Form::open(['route'=>'store.search', 'method'=>'get']) !!}
                {!! Form::text('keyword', null, ['placeholder'=>'Search by keyword', 'class'=>'search']) !!}
                {!! Form::submit('search', ['class'=>'search submit']) !!}
                {!! Form::close() !!}
            </div><!-- end search-form -->

            <div id="user-menu">

                @if(!auth()->check())
                    <nav id="signin" class="dropdown">
                        <ul>
                            <li>
                                <a href="#"><img src="{{ asset('img/user-icon.gif') }}" alt="Sign In"/> Sign In <img
                                            src="{{ asset('img/down-arrow.gif') }}" alt="Sign In"/></a>
                                <ul>
                                    <li><a href="{{ route('loginform') }}">Sign In</a></li>
                                    <li><a href="{{ route('registerform') }}">Sign Up</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                @else
                    <nav class="dropdown">
                        <ul>
                            <li>
                                <a href="#"><img src="{{ asset('img/user-icon.gif') }}"
                                                 alt="{{ auth()->user()->present()->fullName }}"/> {{ auth()->user()->present()->fullName }}
                                    <img src="{{ asset('img/down-arrow.gif') }}"
                                         alt="{{ auth()->user()->present()->fullName }}"/></a>
                                <ul>
                                    <li><a href="#">Order History</a></li>
                                    @if(auth()->user()->admin)
                                        <li><a href="{{ route('admin.categories.index') }}">Manage categories</a></li>
                                        <li><a href="{{ route('admin.products.index') }}">Manage products</a></li>
                                    @endif
                                    <li><a href="{{ route('logout') }}">Sign Out</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                @endif
            </div><!-- end user-menu -->

            <div id="view-cart">
                <a href="#"><img src="{{ asset('img/blue-cart.gif') }}" alt="View Cart"> View Cart</a>
            </div><!-- end view-cart -->
        </section><!-- end action-bar -->
    </header>

    @yield('promo')

    @yield('search-keyword')

    <hr/>

    <section id="main-content" class="clearfix">

        @if (session()->has('message'))
            <p class="alert">{{ session()->get('message') }}</p>
        @endif

        @yield('content')

    </section><!-- end main-content -->

    <hr/>

    @yield('pagination')

    <footer>
        <section id="contact">
            <h3>For phone orders please call 1-800-000. You<br>can also email us at <a href="mailto:office@shop.com">office@shop
                    .com</a></h3>
        </section><!-- end contact -->

        <hr/>

        <section id="links">
            <div id="my-account">
                <h4>MY ACCOUNT</h4>
                <ul>
                    @if(!auth()->check())
                        <li><a href="{{ route('loginform') }}">Sign In</a></li>
                        <li><a href="{{ route('registerform') }}">Sign Up</a></li>
                    @else
                        <li><a href="#">Order History</a></li>
                    @endif
                    <li><a href="#">Shopping Cart</a></li>
                </ul>
            </div><!-- end my-account -->
            <div id="info">
                <h4>INFORMATION</h4>
                <ul>
                    <li><a href="#">Terms of Use</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div><!-- end info -->
            <div id="extras">
                <h4>EXTRAS</h4>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="{{ route('store.contact') }}">Contact Us</a></li>
                </ul>
            </div><!-- end extras -->
        </section><!-- end links -->

        <hr/>

        <section class="clearfix">
            <div id="copyright">
                <div id="logo">
                    <a href="{{ route('store.index') }}"><span id="logo-accent">e</span>Commerce</a>
                </div><!-- end logo -->
                <p id="store-desc">This is a short description of the store.</p>
                <p id="store-copy">&copy; 2013 eCommerce. Theme designed by Adi Purdila.</p>
            </div><!-- end copyright -->
            <div id="connect">
                <h4>CONNECT WITH US</h4>
                <ul>
                    <li class="twitter"><a href="#">Twitter</a></li>
                    <li class="fb"><a href="#">Facebook</a></li>
                </ul>
            </div><!-- end connect -->
            <div id="payments">
                <h4>SUPPORTED PAYMENT METHODS</h4>
                <img src="{{ asset('img/payment-methods.gif') }}" alt="Supported Payment Methods">
            </div><!-- end payments -->
        </section>
    </footer>
</div><!-- end wrapper -->

<script src="{{ asset('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js') }}"></script>
<script>window.jQuery || document.write('<script src="{{ asset('js/vendor/jquery-1.9.1.min.js') }}"><\/script>')</script>
<script src="{{ asset('js/plugins.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    var _gaq = [['_setAccount', 'UA-XXXXX-X'], ['_trackPageview']];
    (function (d, t) {
        var g = d.createElement(t), s = d.getElementsByTagName(t)[0];
        g.src = '//www.google-analytics.com/ga.js';
        s.parentNode.insertBefore(g, s)
    }(document, 'script'));
</script>
</body>
</html>
