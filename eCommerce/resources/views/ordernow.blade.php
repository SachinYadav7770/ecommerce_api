@extends('layout/master')
@section('content')
<div class="container my-2">
    <div class="row">
        <table class="table table-dark table-striped">
            <tbody>
            <tr>
                <td>Amount</td>
                <td>&#8377; {{ $total }}/-</td>
            </tr>
            <tr>
                <td>Tax</td>
                <td>&#8377; 0/-</td>
            </tr>
            <tr>
                <td>Delevery</td>
                <td>&#8377; 10/-</td>
            </tr>
            <tr>
                <td>Total</td>
                <td>&#8377; {{ $total+10 }}/-</td>
            </tr>
            </tbody>
        </table>  
        <div class="jumbotron col-sm-12">
            <div class="container-fluid">
                <div class="centered">
                <form action="place_order" method="post"> @csrf
                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Enter your address" name="address">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="email" placeholder="Enter your email" name="email">
                        </div>
                    </div>
                    <div class="form-check" style="padding-top: .5rem;">
                        <input class="form-check-input" type="radio" name="paymentMethod" id="exampleRadios1" value="cod" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            Cash On Delevery
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="paymentMethod" id="exampleRadios2" value="paynow">
                        <label class="form-check-label" for="exampleRadios2">
                            Pay Now
                        </label>
                    </div>
                    <div class="form-check disabled">
                        <input class="form-check-input" type="radio" name="paymentMethod" id="exampleRadios3" value="byEMI" disabled>
                        <label class="form-check-label" for="exampleRadios3">
                            Pay by EMI
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary my-2">Submit</button>
                    </form>
                </div>  
            </div>
        </div>
    </div>
</div>
<style>
.jumbotron {
    color: white;
    background-color: #2c3034;
}
</style>
@endsection