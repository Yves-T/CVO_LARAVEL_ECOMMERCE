@extends('layouts.main')

@section('content')

    <div id="product-image">
        <img src="{{ asset($product->image) }}" alt="{{ $product->title }}">
    </div><!-- end product-image -->
    <div id="product-details">
        <h1>{{ $product->title }}</h1>
        <p>{{ $product->description }}</p>

        <hr/>

        @if ($product->availability)
            {!! Form::open(['route'=>'store.cart.add']) !!}
            {!! Form::hidden('id', $product->id) !!}
            {!! Form::label("quantity", 'Qty') !!}
            {!! Form::text('quantity', 1, ['maxLength'=>2]) !!}
            <button type="submit" class="secondary-cart-btn">
                <img src="{{ asset('img/white-cart.gif') }}" alt="Add to Cart" />
                ADD TO CART
            </button>
            {!! Form::close() !!}
        @else
            <p class="outofstock">
                This item is not available.
            </p>
        @endif
    </div><!-- end product-details -->
    <div id="product-info">
        <p class="price">${{ $product->price }}</p>
        <p>Availability: {!! $product->present()->showAvailability !!}</p>
        <p>Product Code: <span>{{ $product->id }}</span></p>
    </div><!-- end product-info -->

@endsection
