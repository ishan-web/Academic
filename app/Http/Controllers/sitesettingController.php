<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\sitesetting;
use Session;

class sitesettingController extends Controller
{
    public function index()
    {
        Session::put('topmenu','setting');
        Session::put('menu','sitesetting');
        $sitesetting = sitesetting::first();
        return view('admin.sitesetting.index',compact('sitesetting'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' =>'required'
        ]);
        $sitesetting = sitesetting::firstOrNew();
        $sitesetting->name = $request->name;
        $sitesetting->contanct = $request->contanct;
        $sitesetting->contacttwo = $request->contacttwo;
        $sitesetting->email = $request->email;
        $sitesetting->address = $request->address;
        $sitesetting->description = $request->description;
        $sitesetting->map = $request->map;
        $sitesetting->facebook = $request->facebook;
        $sitesetting->twitter = $request->twitter;
        $sitesetting->youtube = $request->youtube;
        $sitesetting->instagram = $request->instagram;
        if($request->hasFile('logo')){
            $sitesetting->logo = time().".".$request->file('logo')->getClientOriginalExtension();
            $request->file('logo')->move(public_path('uploads/logo'),$sitesetting->logo);
        }
        if($request->hasFile('favicon')){
            $sitesetting->favicon = time().$request->file('favicon')->getClientOriginalExtension();
            $request->file('favicon')->move(public_path('uploads/favicon'),$sitesetting->favicon);
        }
        return $sitesetting->save()?redirect()->back()->with(['success'=>'Form Saved Successfully']): redirect()->back()->with(['failure'=>'Form Submit Failed']);
    }
}
