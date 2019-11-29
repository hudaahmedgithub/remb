<?php


namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Operation;
use App\Muser;
use Illuminate\Http\Request;

class OperationController extends Controller
{
	public function index()
    {
      $category=Operation::all();
		return view('dashboard.operation.index',compact('category'));
    }
   public function create()
    {
       return view('dashboard.operation.create');
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
		
		Operation::create($request->all());
		return redirect()->route('dashboard.operation.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
		$category=Operation::find($id);
        return view('dashboard.operation.edit',compact('category'));
    }

    public function update(Request $request,Operation $operation)
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
		
		$operation->update($request->all());
		 return redirect()->route('dashboard.operation.index');
    }

    public function destroy(Operation $operation)
    {
        $operation->delete();
		return redirect()->route('dashboard.operation.index');
    
    }
}
