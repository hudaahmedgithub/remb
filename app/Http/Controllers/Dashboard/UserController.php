<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\User;
use Flash;
use Intervention\Image\Facades\Image;
class UserController extends Controller
{
	public function __contruct()
	{
		 $this->middleware(['permission:read_users'])->only('index');
        $this->middleware(['permission:create_users'])->only('create');
        $this->middleware(['permission:update_users'])->only('edit');
        $this->middleware(['permission:delete_users'])->only('destroy');

	}
    public function index(Request $request)
    {
		
        $users=User::whereRoleIs('admin')->when($request->search,function($query) use ($request){
				return $query->where('name','like','%'.$request->search. '%');
			})->latest()->paginate(30);
		return view('dashboard.users.index',compact('users'));
    }

  
    public function create()
    {
       return view('dashboard.users.create');
    }

    public function store(Request $request)
    {
		//dd($request->all());
		$request->validate([
			'name'=>'required',
			'email'=>'required|unique:users',
			'image'=>'required|image',
			'password'=>'required|confirmed',
			'permissions'=>'required'
		]);
		$request_data=$request->except('password','password_confirmation','permissions','image');
	
		$request_data['password']=bcrypt($request->password);
		
		if($request->image)
		{
			Image::make($request->image)->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();})
				->save(public_path('uploads/user_images/'.$request->image->hashName()));
			$request_data['image']=$request->image->hashName();
		}
												 
		
        $user=User::create($request_data);
		$user->attachRole('admin');
		$user->syncPermissions($request->permissions);
        $request_data['image']=$request->image->hashName();
		return 
		redirect()->route('dashboard.users.index');
    }

    public function show($id)
    {
        //
    }

    public function edit(User $user)
    {
		return view('dashboard.users.edit',compact('user'));
    }

    public function update(Request $request,User $user)
    {
			$request->validate([
			'name'=>'required',
			'email' => ['required', Rule::unique('users')->ignore($user->id),],
			'image'=>'required|image',
		    'password'=>'required|confirmed',
			'permissions'=>'required'
		]);
		$request_data=$request->except('permissions','image');
	if($user->image != 'default.png')
		{
		Storage::disk('public_uploads')->delete('/user_images/'.$user->image);
		
	     }
		if($request->image)
		{
			Image::make($request->image)->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();})
				->save(public_path('uploads/user_images/'.$request->image->hashName()));
			$request_data['image']=$request->image->hashName();
		}
		
		$user->update($request_data);
		
		$user->syncPermissions($request->permissions);
      return 
		redirect()->route('dashboard.users.index');
		
    }

    public function destroy(User $user)
    {
		if($user->image != 'default.png')
		{
			Storage::disk('public_uploads')->delete('/user_images/'.$user->image);
		}
       $user->delete();
		return redirect()->route('dashboard.users.index');
    }
}
