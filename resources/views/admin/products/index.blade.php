@extends('layouts.main')

@section('content')

    <div id="admin">
        <h1>Product Admin Panel</h1>
        <hr>
        <p>
            Here you can view, delete and create new products.
        </p>

        <h2>Products</h2>
        <hr>
        @if(count($products))
            <ul>
                @foreach($products as $product)
                    <li>
                        <img src="{{ asset($product->image) }}" alt="{{ $product->title }}" width="50">
                        {{ $product->title }} -

                        {!! Form::open([
                            'route'=>['admin.products.destroy', $product->id],
                            'method'=>'delete',
                            'class'=>'form-inline',
                        ]) !!}
                        {!! Form::submit('delete') !!}
                        {!! Form::close() !!} -

                        {!! Form::open([
                            'route'=>['admin.products.toggle', $product->id],
                            'class'=>'form-inline',
                            'method'=>'post',
                        ]) !!}
                        {!! Form::hidden('id', $product->id) !!}
                        {!! Form::select('availability', [
                            '1' => 'In Stock',
                            '0' => 'Out of Stock'
                        ], $product->availability) !!}
                        {!! Form::submit('Update') !!}
                        {!! Form::close() !!}
                    </li>
                @endforeach
            </ul>
        @else
            <p>There are no products yet!</p>
        @endif

        <h2>Create new product</h2>
        <hr>
        @include('shared.errors')
        {!! Form::open(['route'=>'admin.products.store', 'files'=>true]) !!}
        <p>
            {!! Form::label('category_id', 'Category') !!}
            {!! Form::select('category_id', $categories) !!}
        </p>
        <p>
            {!! Form::label('title') !!}
            {!! Form::text('title') !!}
        </p>
        <p>
            {!! Form::label('description') !!}
            {!! Form::textarea('description') !!}
        </p>
        <p>
            {!! Form::label('price') !!}
            {!! Form::text('price', null, ['class'=>'form-price']) !!}
        </p>
        <p>
            {!! Form::label('image', 'Choose as image') !!}
            {!! Form::file('image') !!}
        </p>

        {!! Form::submit('Create Product', ['class'=>'secondary-cart-btn']) !!}
        {!! Form::close() !!}
    </div><!-- end admin -->

@endsection
