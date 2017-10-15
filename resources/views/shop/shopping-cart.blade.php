@extends('layouts.app')

@section('content')
    @if(Session::has('cart'))

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <ul class="list-group">
                        @foreach($products as $product)
                            <li class="list-group-item">
                                <span class="badge">{{ $product['qty'] }}</span>
                                <strong>{{ $product['item']['name'] }}</strong>
                                <span class="label label-success">{{ $product['price'] }}€</span>
                                <span>Reduce by 1</span>
                                <span>||</span>
                                <span>Reduce all</span>
                            </li>
                        @endforeach
                    </ul>

                    <strong>Total : {{ $totalPrice }} €</strong>
                    <a href="{{ route('checkout') }}" type="button" class="btn btn-primary">Checkout</a>

                </div>
            </div>
        </div>
    @else
        <div class="container">
            <div class="row">
                <h2>No items in cart! </h2>
            </div>
        </div>
    @endif

@endsection