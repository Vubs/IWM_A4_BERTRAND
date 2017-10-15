@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1" style="background-color: grey">
                <h2>{{ $productType->type_name }} / {{ $product->name }}</h2>
                <div class="col-md-7" style="height: 300px; background-color: #00dd00">
                    Image ?
                </div>

                <div class="col-md-5" style="height: 300px; background-color: #1c2b36">
                    <h2>{{ $product->name }}</h2>
                    <p>{{ $product->price }} €</p>

                    <a class="btn btn-primary" href="{{ route('product-add', $product->id) }}">Add to cart</a>

                </div>
            </div>
        </div>
    </div>

@endsection

