@extends('layout/master')
@section('content')
    <div class="product-slider my-2">
        <div id="demo" class="carousel slide" data-ride="carousel">
            
            <!-- The slideshow -->
            <div class="carousel-inner">
                @foreach ($devices as $device)
                <div class="carousel-item {{ $device['id']==1?'active':'' }}">
                    <div class="slider-content">
                        <img src="{{ $device->gallery }}" alt="{{ $device->name }}" style="height: 450px;">
                    </div>
                    <div class="carousel-caption">
                        <a href="details/{{ $device->id }}">
                            <h3>{{ $device->name }}</h3>
                        </a>
                        <p>{{ $device->description }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>      
        </div>  
    </div>

<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">

			<!-- Wrapper for carousel items -->
            <div class="container multi-slider">
            <div class="carousel-inner">
            <?php $group = 1; ?>
            @foreach ($devices as $device)
            <?php
                if($group == 1){
                    ?>
				    <div class="item carousel-item {{ $device['id']==1?'active':'' }}">
					<div class="row">
                    <div class="col-sm-3">
							<div class="thumb-wrapper">
								<span class="wish-icon"><i class="fa fa-heart-o"></i></span>
								<div class="img-box">
									<img src="{{ $device->gallery }}" class="img-fluid" alt="{{ $device->name }}">
								</div>
								<div class="thumb-content">
                                    <a href="details/{{ $device->id }}">
									    <h4 title="{{ $device->description }}">{{ $device->name }}</h4>									
									</a>
                                    <div class="star-rating">
										<ul class="list-inline">
											<li class="list-inline-item"><i class="fa fa-star"></i></li>
											<li class="list-inline-item"><i class="fa fa-star"></i></li>
											<li class="list-inline-item"><i class="fa fa-star"></i></li>
											<li class="list-inline-item"><i class="fa fa-star-o"></i></li>
											<li class="list-inline-item"><i class="fa fa-star-o"></i></li>
										</ul>
									</div>
									<p class="item-price"><strike>${{ ($device->price*15)/10 }}</strike> <b>${{ $device->price }}</b></p>
									<a href="#" class="btn btn-primary">Add to Cart</a>
								</div>						
							</div>
						</div>
                    <?php
                }else{
                    ?>
                    <div class="col-sm-3">
							<div class="thumb-wrapper">
								<span class="wish-icon"><i class="fa fa-heart-o"></i></span>
								<div class="img-box">
									<img src="{{ $device->gallery }}" class="img-fluid" alt="{{ $device->name }}">
								</div>
								<div class="thumb-content">
                                    <a href="details/{{ $device->id }}">
									    <h4 title="{{ $device->description }}">{{ $device->name }}</h4>	
                                    </a>							
									<div class="star-rating">
										<ul class="list-inline">
											<li class="list-inline-item"><i class="fa fa-star"></i></li>
											<li class="list-inline-item"><i class="fa fa-star"></i></li>
											<li class="list-inline-item"><i class="fa fa-star"></i></li>
											<li class="list-inline-item"><i class="fa fa-star-o"></i></li>
											<li class="list-inline-item"><i class="fa fa-star-o"></i></li>
										</ul>
									</div>
									<p class="item-price"><strike>${{ ($device->price*15)/10 }}</strike> <b>${{ $device->price }}</b></p>
                                    <form action="/eCommerce/addtocart" method="post" style="display: inline;"> @csrf
                                        <input type="hidden" name="product_id" value="{{ $device->id }}">
                                        <input  class="btn btn-primary add-to-card" type="submit" value="Add to card" name="add_to_card">
                                    </form>
								</div>						
							</div>
						</div>
                <?php

                }
                if($group >= 4){
                    $group = 1; ?>
                    
					</div>
				</div>
                <?php
                }else{
                    $group++;
                }
            ?>
            @endforeach
            </div>
            </div>
            <!-- Carousel controls -->
			<a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
			</a>
			<a class="carousel-control-next" href="#myCarousel" data-slide="next">
            <span class="carousel-control-next-icon"></span>
			</a>
            </div>
			</div>
</div>
<style>
.img-fluid {
    height: 130px;
}
.multi-slider{
    width: 100%
}
.multi-slider .carousel-control-next, .multi-slider .carousel-control-prev {
    bottom: unset;
    justify-content: unset;
    width: 2%;
    top: 18%;
}
.multi-slider .carousel-control-prev {
    left: 93%;
}
</style>
@endsection