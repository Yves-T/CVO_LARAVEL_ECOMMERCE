@extends('layouts.main')

@section('search-keyword')

    <hr>
    <section id="search-keyword">
        <h1>Search Results for <span>"{{ $keyword }}"</span></h1>
    </section><!-- end search-keyword -->

@endsection

@section('content')

    <div id="search-results">
        @foreach($products as $product)
            @include('store.product-teaser')
        @endforeach
    </div><!-- end search-results -->

@endsection
