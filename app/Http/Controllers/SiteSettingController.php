<?php

namespace App\Http\Controllers;

use App\SiteSetting;
use Illuminate\Http\Request;
use App\Site_setting;
class SiteSettingController extends Controller
{
   
    public function index()
    {
		$sites=SiteSetting::all();
       return view('admin.sitesetting.show',compact('sites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.sitesetting.index');
		
	}

    public function store(Request $request)
    {
        $setting=new SiteSetting();
		$setting->slug=$request->slug;
		$setting->namesetting=$request->namesetting;
		$setting->value=$request->value;
		$setting->save();
		return redirect('/adminPanel/sitesetting');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SiteSetting  $siteSetting
     * @return \Illuminate\Http\Response
     */
    public function show(SiteSetting $siteSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SiteSetting  $siteSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(SiteSetting $siteSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SiteSetting  $siteSetting
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $site=SiteSetting::find($id);
		$site->value=$request->value;
		$site->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SiteSetting  $siteSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(SiteSetting $siteSetting)
    {
        //
    }
}
