@extends('layouts.app')

@section('content')
    @if(Session::has('cart'))

        {{--{{ dd($products) }}--}}
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <ul class="list-group">
                        @foreach($products as $product)
                            <li class="list-group-item">
                                <span class="badge">{{ $product['qty'] }}</span>
                                <strong>{{ $product['item']['name'] }}</strong>
                                <span class="label label-success">{{ $product['price'] }}€</span>

                                <button type="button" class="btn btn-primary dropdown-toggle">Action <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li>Reduce by 1</li>
                                    <li>Reduce all</li>
                                </ul>
                            </li>
                        @endforeach
                    </ul>

                    <strong>Total : {{ $totalPrice }}</strong>

                    <button type="button" class="btn btn-primary">Checkout</button>

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