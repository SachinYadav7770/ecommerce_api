@extends('layout/master')
@section('content')
<div class="container my-2">
    <div class="row">
        <div class="col" style="text-align:left">
            <h2>Cart Item</h2>
        </div>
        <div class="col" style="text-align:right">
            <button class="btn btn-success order-now" onclick="location.href='order_now';">Owder Now</button>
        </div>    
    </div>
</div>
@foreach ($products as $product)
<div class="container my-2">
    <div class="row item-box">
        <div class="col-sm-4">
            <div class="product-left-col">
                <img src="{{ $product->gallery }}" class="product-img" alt="{{ $product->name }}">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="product-name">
                <span class="product-name-span">{{ $product->name }}</span> <span class="product-category"><sub>{{ $product->category }}</sub></span>
            </div>
            <div class="product-description">
                <h4>{{ $product->description }}</h4>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="product-price">
                <span class="cur-sign">&#8377;</span>
                <span class="price">{{ $product->price }}</span>
                <span class="price-ex">/-</span>
            </div>
            <button class="btn btn-dark remove-to-cart" onclick="location.href='removetocart/{{ $product->cart_id }}';">Remove to cart</button>
        </div>
    </div>
</div>
@endforeach
@endsection