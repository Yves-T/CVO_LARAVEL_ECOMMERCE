@extends('layouts.main')

@section('content')

    <div id="admin">
        <h1>Categories Admin Panel</h1>
        <hr>
        <p>
            Here you can view, delete and create new categories.
        </p>

        <h2>Categories</h2>
        <hr>
        @if(count($categories))
            <ul>
                @foreach($categories as $category)
                    <li>
                        {{ $category->name }}
                        {!! Form::open([
                            'route'=>['admin.categories.destroy', $category->id],
                            'method'=>'delete',
                            'class'=>'form-inline'
                        ]) !!}
                        {!! Form::submit('delete') !!}
                        {!! Form::close() !!}
                    </li>
                @endforeach
            </ul>
        @else
            <p>There are no categories yet!</p>
        @endif

        <h2>Create new category</h2>
        <hr>
        @include('shared.errors')
        {!! Form::open(['route'=>'admin.categories.store']) !!}
        <p>
            {!! Form::label('name') !!}
            {!! Form::text('name') !!}
        </p>
        {!! Form::submit('Create Category', ['class'=>'secondary-cart-btn']) !!}
        {!! Form::close() !!}
    </div><!-- end admin -->