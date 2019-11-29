<?php

namespace App\Http\Controllers;

use App\Bu;
use App\User;
use Illuminate\Http\Request;
use Auth;
use App\Type;
use App\Statu;
use App\Country;
use DB;
use Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
class BuserController extends Controller
{	public function index(Bu $bu, Request $request)
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
	
	public function create()
	{
		$operations=Statu::all();
		$categories=Type::all();
	
		$countries=Country::all();
		// return response()->json($countries);
		return view('userbu.create',compact('operations','categories','countries'));
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
        $bu= new Bu;
		$bu->user_id=Auth::user()->id;
		$bu->bu_price=$request->price;
		$bu->statu_id=$request->rent;
		$bu->type_id=$request->type;
		$bu->bu_square=$request->square;
		$bu->bu_small_dis=$request->small_desc;
		
		$bu->bu_large_dis=$request->large_desc;
		$bu->bu_floor=$request->bu_floor;
		$bu->name=$request->name;
		$bu->email=$request->email;
		$bu->phone=$request->phone;
		$bu->image= $request->image->hashName();
		$bu->country_id=$request->country_id;
		$bu->save();
		return redirect('/');
    }

 public function show(Request $request)
	{
		
	}
	  public function edit($id)
    {
        $bu=Bu::find($id);
		$categories=Type::all();
		$operations=Statu::all();
		$countries=Country::all();
		return view('userbu.edit',compact('bu','categories','operations','countries'));
    }
 public function update(Request $request,Bu $bu,$id)
    {
	 $bu=Bu::find($id);
	$request->validate([
			
			'price'=>'required|integer',
			'rent'=>'required',
		    'type'=>'required',
			'square'=>'required|integer',
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
	  //  $bu->user_id=Auth::user()->id;
		$bu->bu_price=$request->price;
		$bu->statu_id=$request->rent;
		$bu->type_id=$request->type;
	    $bu->country_id=$request->country_id;
		$bu->bu_square=$request->square;
		$bu->bu_small_dis=$request->small_desc;
		$bu->bu_large_dis=$request->large_desc;
	  	$bu->bu_floor=$request->bu_floor;
	  
		$bu->name=$request->name;
		$bu->email=$request->email;
		$bu->phone=$request->phone;
		 $bu->image= $request->image->hashName();
		$bu->save();
		return redirect()->route('buser.index');
    }
 public function destroy($id)
    {
        $bu=Bu::find($id);
		$bu->delete();
		return redirect('/buser')->withFlashMessage('تم الحذف بنجاح');
    }
public function profile($id)
{
	/*$user_id=Auth::user()->id;
		$data=DB::table('users')->where('id',$user_id)->limit(1)->get();*/
	$data=User::find($id);
		return view('owner.index',compact('data'));
}
 public function updateprofile(Request $request,User $user)
 {
		/*DB::table('users')->where('id',$userid)->update($request->except('_token','password'));
       DB::table('users')->update($request->Hash('password'));*/
  	$request_data=$request->except('password');
	 $request_data['password']=bcrypt($request->password);
		$user->update($request_data);
		
		return back()->with('status','your address updated');
	 
 }

}





