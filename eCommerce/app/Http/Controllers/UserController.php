<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\order;
use Session;

class UserController extends Controller
{
    //
    public function login(Request $req){
        $user = User::where(['email'=>$req->email])->first();
        if(!$user || !Hash::check($req->password,$user->password)){
            return "user not matched";
        }else{
            $req->session()->put('user',$user);
            return redirect('/index');
        }
    }

    public function index(Request $req){
        $devices = Product::all();
        return view('products',compact('devices'));
    }

    public function details($id){
        $data = Product::find($id);
        return view('detail',['product'=>$data]);
    }

    public function add_to_cart(Request $req){
        if($req->session()->has('user')){
            $cart = new cart();
            $cart->user_id=$req->session()->get('user')['id'];
            $cart->product_id=$req->product_id;
            $cart->save();
            return redirect('/index');
        }else{
            return redirect('/login');
        }
    }

    static function count_cart_item(){
        $user_id=Session::get('user')['id'];
        return Cart::where('user_id',$user_id)->count();
    }

    static function count_order_item(){
        $user_id=Session::get('user')['id'];
        return Order::where('user_id',$user_id)->count();
    }

    public function cart_item(){
        $user_id=Session::get('user')['id'];
        $products = DB::table('cart')
        ->join('product','cart.product_id','=','product.id')
        ->where('cart.user_id',$user_id)
        ->select('product.*','cart.id as cart_id')
        ->get();
        
        return view('cartitem',['products'=>$products]);
    }

    public function removetocart($id){
        Cart::destroy($id);
        return redirect('cart_item');
    }

    public function order_now(){
        $user_id=Session::get('user')['id'];
        $products = DB::table('cart')
        ->join('product','cart.product_id','=','product.id')
        ->where('cart.user_id',$user_id)
        ->sum('product.price','cart.id as cart_id');
        
        return view('ordernow',['total'=>$products]);
    }

    public function place_order(Request $req){
        $user_id=Session::get('user')['id'];
        $allcart = Cart::where('user_id',$user_id)->get();
        foreach($allcart as $cart){
            $order = new order;
            $order->product_id=$cart->product_id;
            $order->user_id=$cart->user_id;
            $order->status="pending";
            $order->payment_method=$req->paymentMethod;
            $order->payment_status="pending";
            $order->address=$req->address;
            $order->email=$req->email;
            $order->save();
            Cart::where('user_id',$user_id)->where('product_id',$order->product_id)->delete();
        }
        return redirect('/index');
    }

    public function my_order(){
        if(Session::has('user')){
            $user_id=Session::get('user')['id'];
            $orders = DB::table('order')
            ->join('product','order.product_id','=','product.id')
            ->where('order.user_id',$user_id)
            ->get();
            return view('myorder',['myorder'=>$orders]);
        }else{
            return redirect('/index');
        }
    }

    public function sign_up(Request $req){
        $user = new User;
        $user->name=$req->username;
        $user->email=$req->email;
        $user->password=Hash::make($req->password);  
        if($user->save()){
            return redirect('/login');
        }else{
            return redirect('/sign_up');
        }
    }

}
