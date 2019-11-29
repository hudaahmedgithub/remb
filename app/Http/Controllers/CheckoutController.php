<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Product;
use App\Address;
use App\Order;
use Auth;

class CheckoutController extends Controller
{
   public function index()
   {
	   if(Auth::check())
	   {
		   $cartItems=Cart::content();
		   return view('cart.checkout',compact('cartItems'));
	   }
	   else
	   {
		   return redirect('login');
	   }
   }
	public function address(Request $request)
	{
		$request['user_id']=Auth::user()->id;
		Address::create($request->all());
		Order::createOrder();
		Cart::destroy();
		return view('profile.thanksyou');
	}
}
