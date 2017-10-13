@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-10 col-md-offset-1" style="background-color: grey">
        {{-- Product types navigation -> partials ? --}}
        <div class="row-fluid" style="background-color: #00acee; height: 20px">
            <nav id="product_types">
                <ul>
                @foreach ($productTypes as $productType)
                    <li><a href="{{ route('product-type', str_slug($productType->type_name)) }}">{{ $productType->type_name }}</a></li>
                @endforeach
                </ul>
            </nav>
        </div>

        <h2 class="text-center">This is a test title</h2>

        <div class="row">
            @foreach ($products as $product)
            <div class="col-md-4 text-center">
                <div class="card">
                    <img class="card-img-top img-responsive" src="http://via.placeholder.com/300.png/09f/fff" alt="Card image cap">
                    <div class="card-block">
                        <h4 class="card-title">{{ $product->name }}</h4>
                        <p class="card-text">25€</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>

@endsection

