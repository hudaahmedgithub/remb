<?php

namespace App\Http\Controllers;

use App\Muser;
use App\User;
use Illuminate\Http\Request;
use Auth;
use App\Category;
use App\Operation;
use App\Country;
use DB;
use Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class MuserController extends Controller
{
    public function index(Muser $bu, Request $request)
    {
    $categories=Category::all();
	$operations=Operation::all();
	$countries=Country::all();
	$musers=$bu->where('status',1)->orderBy('id','desc')->when($request->search,function($q) use ($request){
		return $q->where('small_dis','like','%'.$request->search.'%');					
		})->when($request->bu_rent,function($q) use ($request){
		return $q->where('operation_id',$request->bu_rent);					
		})->when($request->bu_type,function($q) use ($request){
		return $q->where('category_id',$request->bu_type);				
		})->when($request->country_id,function($q) use ($request){
		return $q->where('country_id',$request->country_id);
	})->latest()->paginate(5);
	return
		view('userm.show',compact('musers','categories','operations','countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $operations=Operation::all();
		$categories=Category::all();
		$countries=Country::all();
		// return response()->json($countries);
		return view('userm.create',compact('operations','categories','countries'));
    }
 public function store(Request $request)
    {
		$request->validate([
			'small_desc'=>'required|min:5|max:100',
			'price'=>'required|integer',
			'rent'=>'required',
			'type'=>'required',
			
			'large_desc'=>'required|min:10|max:225'
		]);
		if ($request->image) {

            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/bu_images/'. $request->image->hashName()));
}//end of if
/*if($request->get('query'))
     {
      $query = $request->get('query');
      $data = DB::table('countries')
        ->where('country_name', 'LIKE', "%{$query}%")
        ->get();
      $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
      foreach($data as $row)
      {
       $output .= '
       <li><a href="#">'.$row->country_name.'</a></li>
       ';
      }
      $output .= '</ul>';
      echo $output;
     }*/
        $bu= new Muser;
		$bu->user_id=Auth::user()->id;
		$bu->price=$request->price;
		$bu->operation_id=$request->rent;
		$bu->category_id=$request->type;
		$bu->small_dis=$request->small_desc;
		$bu->large_dis=$request->large_desc;
	    $bu->name=$request->name;
		$bu->email=$request->email;
		$bu->phone=$request->phone;
	     $bu->stock=$request->stock;
	   $bu->qty=$request->qty;
		$bu->image= $request->image->hashName();
		$bu->country_id=$request->country_id;
		$bu->save();
		return redirect('/');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Muser  $muser
     * @return \Illuminate\Http\Response
     */
    public function show(Muser $muser)
    {
        //
    }

    public function edit($id)
    {
        $bu=Muser::find($id);
		$categories=Category::all();
		$operations=Operation::all();
		$countries=Country::all();
		return view('userm.edit',compact('bu','categories','operations','countries'));
    }

   public function update(Request $request,Muser $bu , $id)
    {
	$bu=Muser::find($id);
	$request->validate([
			
			'price'=>'required|integer',
			'rent'=>'required',
		    'type'=>'required',
			'small_desc'=>'required|min:5|max:100',
			'large_desc'=>'required|min:10|max:225'
		]);
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
		$bu->price=$request->price;
		$bu->operation_id=$request->rent;
		$bu->category_id=$request->type;
	    $bu->country_id=$request->country;
		$bu->small_dis=$request->small_desc;
	    $bu->large_dis=$request->large_desc;
	    $bu->stock=$request->stock;
	   $bu->qty=$request->qty;
		$bu->name=$request->name;
		$bu->email=$request->email;
		$bu->phone=$request->phone;
		$bu->save();
		return redirect('/userShowMu');
    }

    public function destroy($id)
    {
        $bu=Muser::find($id);
		$bu->delete();
		return redirect()->back();
    
    }
	
	public function showOne($id,Muser $bus)
	{
		$bu=$bus->find($id);
		return view('showm',compact('bu'));
	}
	public function showAll(Bu $bu, Request $request)
{
	$categories=Category::all();
	$operations=Operation::all();
	$countries=Country::all();
	$bus=$bu->where('bu_status',1)->orderBy('id','desc')->when($request->search,function($q) use ($request){
		return $q->where('bu_small_dis','like','%'.$request->search.'%');					
		})->when($request->bu_rent,function($q) use ($request){
		return $q->where('operation_id',$request->bu_rent);					
		})->when($request->bu_type,function($q) use ($request){
		return $q->where('category_id',$request->bu_type);					
		})->when($request->country_id,function($q) use ($request){
		return $q->where('country_id',$request->country_id);					
		})->latest()->paginate(5);
	return view('home',compact('bus','categories','operations','countries'));
}
	
	public function rentm(Muser $muser)
{
	$bus=$muser->where('operation_id',2)->orderBy('id','desc')->paginate(5);
	return view('rentm',compact('bus'));
}
	
	public function ownm(Muser $muser)
{
	$bus=$muser->where('status',1)->where('operation_id',1)->orderBy('id','desc')->paginate(5);
	//$same_rent=$bu->where('bu_rent',$bus->bu_rent)->get();
	return view('ownm',compact('bus'));
}
	public function userShowMu(Muser $bu, Request $request)
	{
		
	$categories=Category::all();
	$operations=Operation::all();
	$countries=Country::all();
	$bus=$bu->where('status',1)->orderBy('id','desc')->when($request->search,function($q) use ($request){
		return $q->where('small_dis','like','%'.$request->search.'%');					
		})->when($request->bu_rent,function($q) use ($request){
		return $q->where('operation_id',$request->bu_rent);					
		})->when($request->bu_type,function($q) use ($request){
		return $q->where('category_id',$request->bu_type);					
		})->when($request->country_id,function($q) use ($request){
		return $q->where('country_id',$request->country_id);					
		})->latest()->paginate(5);
	return
		view('userm.showonly',compact('bus','categories','operations','countries'));
	}
}
