<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Statu;
class StatusController extends Controller
{
	public function index()
    {
      $category=Statu::all();
		return view('dashboard.status.index',compact('category'));
    }
   public function create()
    {
       return view('dashboard.status.create');
    }

    public function store(Request $request)
    {
		Statu::create($request->all());
		return redirect()->route('dashboard.status.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
		$category=Statu::find($id);
        return view('dashboard.status.edit',compact('category'));
    }

    public function update(Request $request,$id)
    { 
		$statu=Statu::find($id);
		$statu->update($request->all());
		 return redirect()->route('dashboard.status.index');
    }

    public function destroy($id)
    {
		$statu=Statu::find($id);
        $statu->delete();
		return redirect()->route('dashboard.status.index');
    
    }
}
