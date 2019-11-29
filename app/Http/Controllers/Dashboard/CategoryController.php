<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Category;
class CategoryController extends Controller
{
    public function index(Request $request)
    {
      $category=Category::all();
		return view('dashboard.categories.index',compact('category'));
    }

    public function create()
    {
       return view('dashboard.categories.create');
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
		
		Category::create($request->all());
		return redirect()->route('dashboard.categories.index');
    }

    public function show($id)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('dashboard.categories.edit',compact('category'));
    }

    public function update(Request $request,Category $category)
    { 
		/*$rules=[];
		foreach(config('translatable.locales') as $locale)
		{//to make unique an required
			//$rules +=[$locale . '.name' =>'required'];
			$rules +=[$locale . '.name' =>['required',Rule::unique('category_translations','name')->ignore($category->id,'category_id')]];
			//category_id column that sikpe because use 2 id arabic english
		}
       $request->validate($rules);
	   */
		
		$category->update($request->all());
		 return redirect()->route('dashboard.categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
		return redirect()->route('dashboard.categories.index');
    
    }
}
