@extends('layouts.main')

@section('promo')
    <section id="promo-alt">
        <div id="promo1">
            <h1>The brand new MacBook Pro</h1>
            <p>With a special price, <span class="bold">today only!</span></p>
            <a href="#" class="secondary-btn">READ MORE</a>
            <img src="{{ asset('img/macbook.png') }}" alt="MacBook Pro">
        </div><!-- end promo1 -->
        <div id="promo2">
            <h2>The iPhone 5 is now<br>available in our store!</h2>
            <a href="">Read more <img src="{{ asset('img/right-arrow.gif') }}" alt="Read more"></a>
            <img src="{{ asset('img/iphone.png') }}" alt="iPhone">
        </div><!-- end promo2 -->
        <div id="promo3">
            <img src="{{ asset('img/thunderbolt.png') }}" alt="Thunderbolt">
            <h2>The 27"<br>Thunderbolt Display.<br>Simply Stunning.</h2>
            <a href="#">Read more <img src="{{ asset('img/right-arrow.gif') }}" alt="Read more"/></a>
        </div><!-- end promo3 -->
    </section><!-- promo-alt -->
@endsection

@section('content')
    <h2>{{ $category->name }}</h2>
    <hr>

    <aside id="categories-menu">
        <h3>CATEGORIES</h3>
        <ul>
            @foreach($catnav as $cat)
                <li><a href="{{ route('store.category', $cat->id) }}">{{ $cat->name }}</a></li>
            @endforeach
        </ul>
    </aside><!-- end categories-menu -->

    <div id="listings">
        @foreach($products as $product)
            @include('store.product-teaser')
        @endforeach
    </div>
@endsection

@section('pagination')
    <section id="pagination">
        {!! $products->links() !!}
    </section><!-- end pagination -->
@endsection
