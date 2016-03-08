@extends('layouts.main')

@section('content')

    <div id="shopping-cart">
        <h1>Shopping Cart & Checkout</h1>

        <table border="1">
            <tr>
                <th>#</th>
                <th>Product Name</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>

            @foreach($products as $product)
                <tr>
                    <td>1</td>
                    <td>
                        <img src="{{ $product->options->image }}" alt="Product" width="65" height="37"/>
                        {{ $product->name }}
                    </td>
                    <td>${{ $product->price }}</td>
                    <td>
                        {!! Form::open(['route'=>'store.cart.update', 'method'=>'put']) !!}
                        {!! Form::hidden('rowid', $product->rowid) !!}

                        {!! Form::text('quantity', $product->qty, ['maxlength'=>'2', 'class'=>'qty']) !!}
                        <button type="submit">
                            <img src="{{ asset('img/refresh.gif') }}" alt="Refresh cart"/>
                        </button>
                        {!! Form::close() !!}
                    </td>
                    <td>
                        ${{ $product->subtotal }}
                        {!! Form::open(['route'=>'store.cart.remove', 'method'=>'delete', 'style'=>'display:inline']) !!}
                        {!! Form::hidden('rowid', $product->rowid) !!}
                        <button type="submit">
                            <img src="{{ asset('img/remove.gif') }}" alt="Remove product"/>
                        </button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach

            <tr class="total">
                <td colspan="5">
                    Subtotal: ${{ Cart::total() }}<br />
                    <span>TOTAL: ${{ Cart::total() }}</span><br />

                    <form action="url'=>'https://www.paypal.com/cgi-bin/webscr" method="post">
                        <input type="hidden" name="cmd" value="_xclick">
                        <input type="hidden" name="business" value="blempens@eschool.be">
                        <input type="hidden" name="item_name"
                               value="eCommerce Store Purchase">
                        <input type="hidden" name="amount" value="{{ Cart::total() }}">
                        <input type="hidden" name="currency_code" value="USD">

                        <input type="hidden" name="first_name" value="{{ auth()->user()->firstname }}">
                        <input type="hidden" name="last_name" value="{{ auth()->user()->lastname }}">
                        <input type="hidden" name="email" value="{{ auth()->user()->email }}">

                        <a href="{{ route('store.index') }}" class="tertiary-btn">CONTINUE SHOPPING</a>
                        <input type="submit" value="CHECKOUT WITH PAYPAL" class="secondary-cart-btn">
                    </form>
                </td>
            </tr>

        </table>
    </div><!-- end shopping-cart -->

@endsection