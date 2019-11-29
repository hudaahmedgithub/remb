<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Type;
class TypeController extends Controller
{	
	public function index()
    {
      $category=Type::all();
		return view('dashboard.types.index',compact('category'));
    }
   public function create()
    {
       return view('dashboard.types.create');
    }

    public function store(Request $request)
    {
		/*
		$rules=[];
		foreach(config('translatable.locales') as $locale)
		{//to make unique an required
			//$rules +=[$locale . '.name' =>'required'];
			$rules +=[$locale . '.name' =>['required',Rule::unique('category_translations','name')]];
		}
        $request->validate($rules);*/
		
		Type::create($request->all());
		return redirect()->route('dashboard.types.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
		$category=Type::find($id);
        return view('dashboard.types.edit',compact('category'));
    }

    public function update(Request $request,Type $type)
    { 
		$type->update($request->all());
		 return redirect()->route('dashboard.types.index');
    }

    public function destroy(Type $type)
    {
        $type->delete();
		return redirect()->route('dashboard.types.index');
    
    }
}
