@extends('layout/master')
@section('content')

<div class="container my-4">
    <div class="row">
        <div class="clo-lg-4 fixed">
            <div class="product-left-col">
                <img src="{{ $product->gallery }}" class="detail-product-img" alt="{{ $product->name }}">
            </div>
        </div> 
        <div class="clo-lg-8 scrollit">
            <div class="product-right-col">
                <div class="product-name">
                <span class="product-name-span">{{ $product->name }}</span> <span class="product-category"><sub>{{ $product->category }}</sub></span>
                </div>
                <div class="product-description">
                <h4>{{ $product->description }}</h4>
                </div>
                <div class="product-price">
                <span class="cur-sign">&#8377;</span>
                <span class="price">{{ $product->price }}</span>
                <span class="price-ex">/-</span>
                </div>
                <span>
                <form action="/eCommerce/addtocart" method="post" style="display: inline;"> @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input  class="btn btn-primary add-to-card" type="submit" value="Add to card" name="add_to_card">
                </form>
                </span>
                <span>
                <form action="/eCommerce/buynow" method="post" style="display: inline;"> @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input  class="btn btn-primary buy-now" type="submit" value="Buy Now" name="buy_now">
                </form>
                </span>
            </div>
        </div> 
    </div>
</div>

<style>
.product-left-col .detail-product-img{
    max-height: 420px;
    max-width: 700px;
}
</style>
@endsection