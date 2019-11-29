<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{
    
    public function index(Request $request)
    {
        $products=Product::when($request->search,function($q) use ($request){
		return $q->whereTranslationLike('name','%'.$request->search.'%');					
		})->when($request->category_id,function($q) use ($request){
		return $q->where('category_id',$request->category_id);					
		})->latest()->paginate(5);
		$categories = Category::all();
		
		return view('dashboard.products.index',compact('products','categories'));
    }

    
    public function create()
    {
      
        $categories=Category::all();
		return view('dashboard.products.create',compact('categories'));
    }

    
    public function store(Request $request, Product $product)
    {  $rules = [
            'category_id' => 'required'
        ];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => 'required|unique:product_translations,name'];
            $rules += [$locale . '.description' => 'required'];

        }//end of  for each

        $rules += [
            'purchase_price' => 'required',
            'sale_price' => 'required',
            'stock' => 'required',
        ];

        $request->validate($rules);

        $request_data = $request->all();

        if ($request->image) {

            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/product_images/' . $request->image->hashName()));

            $request_data['image'] = $request->image->hashName();

        }//end of if

        Product::create($request_data);
       
        return redirect()->route('dashboard.products.index');

    }

    
    public function show($id)
    {
        //
    }

    
    public function edit(Product $product)
    {
		$categories=Category::all();
       return view('dashboard.products.edit',compact('product','categories'));
    }

    
    public function update(Request $request,Product $product)
    {
         $rules = [
            'category_id' => 'required'
        ];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => ['required',Rule::unique('product_translations','name')->ignore($product->id,'product_id')]];
            $rules += [$locale . '.description' => 'required'];

        }//end of  for each

        $rules += [
            'purchase_price' => 'required',
            'sale_price' => 'required',
            'stock' => 'required',
        ];

        $request->validate($rules);

        $request_data = $request->all();

	 if ($request->image) {
						   
           if($request->image != 'default.png')
		 {
			Storage::disk('public_uploads')->delete('/product_images/'.$product->image);			   
		   }
		 Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/product_images/' . $request->image->hashName()));

            $request_data['image'] = $request->image->hashName();

        }//end of if
      $product->update($request_data);
		return redirect()->route('dashboard.products.index');			   
    }

  
    public function destroy(Product $product)
    {
       			   
    if($product->image != 'default.png')
		 {
			Storage::disk('public_uploads')->delete('/product_images/'.$product->image);			   
		   }
    
		$product->delete();
		return redirect()->route('dashboard.products.index');	
  }
}