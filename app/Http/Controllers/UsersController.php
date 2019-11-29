<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\addUserRequestAdmin;
use App\User;
use Auth;
use Hash;
class UsersController extends Controller
{
    public function index()
    {
      $users=User::all();
		return view('admin.user.index',compact('users'));
    }

    public function create()
    {
        return view('admin.user.add');
    }

    public function store(addUserRequestAdmin $request,User $user)
    {
		 $user->create([
            'name' => $request->name,
            'email' =>$request->email,
            'password'=>Hash::make($request->password),
        ]);
    return redirect('/adminPanel/user')->withFlashMessage('تم اضافه العضو بنجاح');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
		$user=User::find($id);
		return view('admin.user.edit',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user=User::find($id);
		$user->name=$request->name;
		$user->email=$request->email;
		$user->password=$request->password;
		$user->save();
		return redirect('/adminPanel/user');
		
    }

    public function destroy($id)
    {
      User::find($id)->delete();
		return redirect('/adminPanel/user')->withFlashMessage('تم الحذف بنجاح');
    }
	
	
}
