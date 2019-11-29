<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Product;
use Auth;
use App\Order_product;
use DB;
use App\Order;

class ProfileController extends Controller
{
    public function index()
	{
		return view('profile.index');
	}
	
	public function orders()
	{
		$user_id=Auth::user()->id;
		$orders=DB::table('Order_product')->leftJoin('products','products.id','=','Order_product.product_id')->leftJoin('orders','orders.id','=','Order_product.order_id')->where('orders.user_id','=',$user_id)->get();
		return view('profile.orders',compact('orders'));
	}
	
	public function address()
	{
		$user_id=Auth::user()->id;
		$address=DB::table('address')->where('user_id',$user_id)->limit(1)->get();
		return view('profile.address',compact('address'));
	}
	public function updateAddress(Request $request)
	{
		$userid=Auth::user()->id;
		DB::table('address')->where('user_id',$userid)->update($request->except('_token'));
		return back()->with('status','your address updated');
	}
	public function password()
	{
	  return view('profile.updatePassword');	
	}
	public function updatePassword(Request $request){
		$oldPassword=$request->oldPassword;
		
		$newPassword=$request->newPassword;
		
			if(!Hash::check($oldPassword,Auth::user()->password))
			{
				return back()->with('error','your current password is not correct');
			}
		else
		{
			$request->user()->fill(['password'=>Hash::make($newPassword)])->save();
			return back()->with('status','your  password is updated');
		}
		
		
		
	}
}





