@extends('layouts.main')

@section('content')

    @include('shared.errors')

    <div id="new-account">
        <h1>Create new account</h1>

        @include('shared.errors')

        {!! Form::open(['route' => 'register']) !!}

        <p>
            {!! Form::label('firstname') !!}
            {!! Form::text('firstname') !!}
        </p>
        <p>
            {!! Form::label('lastname') !!}
            {!! Form::text('lastname') !!}
        </p>
        <p>
            {!! Form::label('email') !!}
            {!! Form::email('email') !!}
        </p>
        <p>
            {!! Form::label('password') !!}
            {!! Form::password('password') !!}
        </p>
        <p>
            {!! Form::label('password_confirmation') !!}
            {!! Form::password('password_confirmation') !!}
        </p>
        <p>
            {!! Form::label('telephone') !!}
            {!! Form::text('telephone') !!}
        </p>

        {!! Form::submit('Create new account', ['class'=>'secondary-cart-btn']) !!}

        {!! Form::close() !!}
    </div>

@endsection
