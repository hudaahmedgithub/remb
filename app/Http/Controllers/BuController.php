<?php

namespace App\Http\Controllers;

use App\Bu;
use App\User;
use Illuminate\Http\Request;
use Auth;
use App\Type;
use App\Statu;
use App\Country;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
//use Intervention\Image\Facades\Image as Image;
class BuController extends Controller
{
   
    public function index()
    {
		$bus=Bu::all();
		//$categories=Category::all();
       return view('admin.bu.index',compact('bus'));
    }

    public function create()
    {
		$categories=Type::all();
		$operations=Statu::all();
		$countries=Country::all();
       return view('admin.bu.create',compact('categories','operations','countries'));
    }

  
    public function store(Request $request)
    {
		$request->validate([
			'small_desc'=>'required|min:5|max:100',
			'price'=>'required|integer',
			'rent'=>'required',
			'square'=>'required|integer',
			
			'type'=>'required',
			'large_desc'=>'required|min:10|max:225'
		]);
		if ($request->image) {

            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/bu_images/' . $request->image->hashName()));
}//end of if

        $bu= new Bu;
		$bu->user_id=Auth::user()->id;
		$bu->bu_price=$request->price;
		$bu->type_id=$request->rent;
		$bu->statu_id=$request->type;
		$bu->country_id=$request->country_id;
		$bu->bu_square=$request->square;
		$bu->bu_small_dis=$request->small_desc;
		$bu->bu_large_dis=$request->large_desc;
		$bu->bu_floor=$request->bu_floor;
		$bu->bu_name=$request->name;
		$bu->bu_email=$request->email;
		$bu->bu_phone=$request->phone;
		$bu->image= $request->image->hashName();
		$bu->save();
		return redirect()->route('bu.index');
    }

 
    public function show(bu $bu)
    {
        //
    }
	
	public function showOne($id,Bu $bus)
	{
		$bu=$bus->find($id);
		//$same_type=$bus->where('bu_type',$bu->bu_type)->get();
		return view('show',compact('bu'));
	}
	
public function showAll(Bu $bu, Request $request)
{
	$categories=Type::all();
	$operations=Statu::all();
	$countries=Country::all();
	$bus=$bu->where('bu_status',1)->orderBy('id','desc')->when($request->search,function($q) use ($request){
		return $q->where('bu_small_dis','like','%'.$request->search.'%');					
		})->when($request->bu_rent,function($q) use ($request){
		return $q->where('statu_id',$request->bu_rent);					
		})->when($request->bu_type,function($q) use ($request){
		return $q->where('type_id',$request->bu_type);					
		})->when($request->country_id,function($q) use ($request){
		return $q->where('country_id',$request->country_id);					
		})->latest()->paginate(5);
	return view('home',compact('bus','categories','operations','countries'));
}
	
	public function rent(Bu $bu)
{
	$bus=$bu->where('type_id',1)->orderBy('id','desc')->paginate(5);
	return view('rent',compact('bus'));
}
	
	public function own(Bu $bu)
{
	$bus=$bu->where('bu_status',1)->where('type_id',2)->orderBy('id','desc')->paginate(5);
	//$same_rent=$bu->where('bu_rent',$bus->bu_rent)->get();
	return view('own',compact('bus'));
}
  
    public function edit($id)
    {
        $bu=Bu::find($id);
		$categories=Type::all();
		$operations=Statu::all();
		$countries=Country::all();
		return view('admin.bu.edit',compact('bu','categories','operations','countries'));
    }
  public function update(Request $request,Bu $bu)
    {
	$request->validate([
			
			'price'=>'required|integer',
			'rent'=>'required',
		    'type'=>'required',
			'square'=>'required|integer',
			'small_desc'=>'required|min:5|max:100',
			'large_desc'=>'required|min:10|max:225'
		]);
       // $cat=Category::find($id);
	   if ($request->image) {
						   
           if($request->image != 'default.png')
		 {
			Storage::disk('public_uploads')->delete('/bu_images/'.$bu->image);			   
		  }
		 Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/bu_images/' . $request->image->hashName()));

            $bu['image'] = $request->image->hashName();
	   }
	    $bu->user_id=Auth::user()->id;
		$bu->bu_price=$request->price;
		$bu->type_id=$request->rent;
		$bu->statu_id=$request->type;
	    $bu->country_id=$request->country_id;
		$bu->bu_square=$request->square;
		$bu->bu_small_dis=$request->small_desc;
		$bu->bu_large_dis=$request->large_desc;
	  	$bu->bu_floor=$request->bu_floor;
		$bu->name=$request->name;
		$bu->email=$request->email;
		$bu->phone=$request->phone;
		
		$bu->save();
		return redirect()->route('bu.index');
    }

    
    public function destroy($id)
    {
      Bu::find($id)->delete();
		return redirect('/adminPanel/bu')->withFlashMessage('تم الحذف بنجاح');
    }
	
	public function userAddBu()
	{
		$operations=Statu::all();
		$categories=Type::all();
		$countries=Country::all();
		return view('userbu.create',compact('operations','categories','countries'));
	}
	
	public function userStoreBu(Request $request)
	{
		$request->validate([
			'small_desc'=>'required|min:5|max:100',
			'price'=>'required|integer',
			'rent'=>'required',
			'square'=>'required|integer',
			'type'=>'required',
			'large_desc'=>'required|min:10|max:225'
		]);
		if ($request->image) {

            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/bu_images/' . $request->image->hashName()));
}//end of if

        $bu= new Bu;
		$bu->user_id=Auth::user()->id;
		$bu->bu_price=$request->price;
		$bu->type_id=$request->rent;
		$bu->statu_id=$request->type;
		$bu->bu_square=$request->square;
		$bu->bu_small_dis=$request->small_desc;
		$bu->bu_large_dis=$request->large_desc;
		$bu->bu_floor=$request->bu_floor;
		$bu->bu_name=$request->name;
		$bu->bu_email=$request->email;
		$bu->bu_phone=$request->phone;
		$bu->image= $request->image->hashName();
		$bu->save();
		return redirect('/');
	}
	  public function userEditBu($id)
    {
        $bu=Bu::find($id);
		$categories=Type::all();
		$operations=Statu::all();
		$countries=Country::all();
		return view('userbu.edit',compact('bu','categories','operations','countries'));
    }
  public function userUpdateBu(Request $request,Bu $bu)
    {
	
	$request->validate([
			
			'price'=>'required|integer',
			'rent'=>'required',
		    'type'=>'required',
			'square'=>'required|integer',
			'small_desc'=>'required|min:5|max:100',
		    
			'large_desc'=>'required|min:10|max:225'
		]);
       // $cat=Category::find($id);
	
	   if ($request->image) {
						   
           if($request->image != 'default.png')
		 {
			Storage::disk('public_uploads')->delete('/product_images/'.$bu->image);			   
		   }
		 Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/bu_images/' . $request->image->hashName()));

            $bu['image'] = $request->image->hashName();
	   }
	    $bu->user_id=Auth::user()->id;
		$bu->bu_price=$request->price;
		$bu->type_id=$request->rent;
		$bu->statu_d=$request->type;
		$bu->bu_square=$request->square;
		$bu->bu_small_dis=$request->small_desc;
		$bu->country_id=$request->country_id;
		$bu->bu_large_dis=$request->large_desc;
	  	$bu->bu_floor=$request->bu_floor;
		$bu->bu_name=$request->name;
		$bu->bu_email=$request->email;
		$bu->bu_phone=$request->phone;
		
		$bu->save();
	  
		return redirect('/userShowBu');
    }

    
    public function userDestroyBu($id)
    {
        $bu=Bu::find($id);
		$bu->delete();
		return redirect('/userbu/show')->withFlashMessage('تم الحذف بنجاح');
    }
	
	public function userShowBu(Bu $bu, Request $request)
	{
		
	$categories=Type::all();
	$operations=Statu::all();
	$countries=Country::all();
	$bus=$bu->where('bu_status',1)->orderBy('id','desc')->when($request->search,function($q) use ($request){
		return $q->where('bu_small_dis','like','%'.$request->search.'%');					
		})->when($request->bu_rent,function($q) use ($request){
		return $q->where('statu_id',$request->bu_rent);					
		})->when($request->bu_type,function($q) use ($request){
		return $q->where('type_id',$request->bu_type);					
		})->when($request->country_id,function($q) use ($request){
		return $q->where('country_id',$request->country_id);					
		})->latest()->paginate(5);
	return
		view('userbu.show',compact('bus','categories','operations','countries'));
	}
}
