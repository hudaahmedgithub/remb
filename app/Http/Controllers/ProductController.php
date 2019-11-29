<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
class ProductController extends Controller
{
    public function index()
    {
       $products=Product::all();
		return view('admin.product.index',compact('products'));
    }

   
    public function create()
    {
		$categories=Category::pluck('name','id');
        return view('admin.product.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $formInput=$request->except('image');
		$image=$request->image;
		if($image)
		{
			$imageName=$image->getClientOriginalName();
			$image->move('dist/images',$imageName);
			$formInput['image']=$imageName;
		}
		Product::create($formInput);
		return redirect()->back();
    }

    public function show($id)
    {
        //
    }


	   public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $productDelete=Product::findOrfail($id);
		$productDelete->delete();
		return redirect()->back();
    }
}
