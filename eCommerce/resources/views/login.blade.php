@extends('layout/master')
@section('content')
<div class="container jumbotron my-2">
  <div class="box login-box">
    <form action="login" method="post"> @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
<style>
.container {
    display: flex;
    justify-content: center;
}
.jumbotron {
    color: white;
    background-color: #2c3034;
}
.login-box{
    width: 55%;
}
</style>
@endsection