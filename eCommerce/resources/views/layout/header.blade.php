<?php
use App\Http\Controllers\UserController;
$cart_total = 0;
if(Session::has('user')){
  $cart_total = UserController::count_cart_item();
}
$order_total = 0;
if(Session::has('user')){
  $order_total = UserController::count_order_item();
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index">
    <!-- <img src="{{ url('/resources/image/Apple-Logo-PNG-Picture.png')}}" alt="E-commerse"> -->
    E-commerse
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      @if(!Session::has('user') || $order_total <= 0)
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Order</a>
      </li>
      @else
      <li class="nav-item">
        <a class="nav-link" href="my_order">Order({{ $order_total }})</a>
      </li>
      @endif
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <ul class="navbar-nav">
      <!-- Dropdown -->
      @if(Session::has('user'))
      <li class="nav-item">
        <a class="nav-link" href="/eCommerce/cart_item">Cart({{ $cart_total }})</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        {{ Session::get('user')['name'] }}
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="logout">Logout</a>
        </div>
      </li>
      @else
      <li class="nav-item">
        <a class="nav-link" href="/eCommerce/login">Login</a>
      </li>
      @endif
    </ul>
    
  </div>
</nav>