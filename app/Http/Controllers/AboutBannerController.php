<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\about_topbanner;
use App\Models\about_mission;
use App\Models\about_banner;
use App\Models\about_vision;
use Session;
use Image;

class AboutBannerController extends Controller
{

    public function index()
    {
        Session::put('topmenu', 'topbanner');

        $aboutbanner = about_topbanner::all();
        return view('admin.about.top.index', compact('aboutbanner'));
    }


    public function store(Request $request)
    {
        $aboutbanner= new about_topbanner;    
        $aboutbanner->title = $request->title;
        $aboutbanner->desc = $request->desc;   
        $aboutbanner->relation = $request->relation;
        $aboutbanner->status = $request->status;
        if($request->hasFile('image')){
            $imagename=time().'image.'.$request->file('image')->getClientOriginalExtension();
            if($request->image_data==null){
                $request->file('image')->move(public_path('images/banner'), $imagename);
            }else{
                $imagedata=json_decode($request->image_data,true);
                $image=Image::make($request->file('image'));
                $image->crop($imagedata['width'],$imagedata['height'],$imagedata['x'],$imagedata['y']);
                $image->save(public_path('images/banner/'.$imagename));
            }
            $aboutbanner->image = $imagename;
        }
        return $aboutbanner->save()?redirect()->back()->with(['success'=>'Form saved successfully']): redirect()->back()->with(['failure'=>'form submission failed']);
        
    }

    public function edit(string $id)
    {
        $aboutbanner = about_topbanner::findOrFail($id);
        return view('admin.about.top.edit', compact('aboutbanner'));
    }

    public function update(Request $request, string $id)
    {
        $aboutbanner = about_topbanner::findOrFail($id);
        $aboutbanner->title = $request->title;
        $aboutbanner->desc = $request->desc;   
        $aboutbanner->relation = $request->relation;
        $aboutbanner->status = $request->status;
        if($request->hasFile('image')){
            @unlink(public_path('images/banner/'.$aboutbanner->image));
            $imagename=time().'image.'.$request->file('image')->getClientOriginalExtension();
            if($request->image_data==null){
                $request->file('image')->move(public_path('images/banner'), $imagename);
            }else{
                $imagedata=json_decode($request->image_data,true);
                $image=Image::make($request->file('image'));
                $image->crop($imagedata['width'],$imagedata['height'],$imagedata['x'],$imagedata['y']);
                $image->save(public_path('images/banner/'.$imagename));
            }
            $aboutbanner->image = $imagename;
        }
        return $aboutbanner->save()?redirect()->back()->with(['success'=>'Form saved successfully']): redirect()->back()->with(['failure'=>'form submission failed']);
    }
    public function destroy(string $id)
    {
        $aboutbanner = about_topbanner::findOrFail($id);
        return $aboutbanner->delete()?redirect()->back()->with(['success'=>'Form deleted succesfully']): redirect()->back()->with(['failed'=>'Form deletion failed']);
    }

    public function topindex()
    {
        Session::put('topmenu', 'about');
        Session::put('menu', 'history');

        $abouttop = about_banner::first();
        return view('admin.about.history.index', compact('abouttop'));
    }

    public function topstore(Request $request)
    {
        $abouttop = about_banner::firstOrNew();
        $abouttop->title = $request-> title;
        $abouttop->desc = $request-> desc;
        $abouttop->status = $request-> status;
        if($request->hasfile('image')){
            $abouttop->image = $request->image->getClientOriginalName();
            $request->image->move(public_path('images/banner/'), $abouttop->image);
        }
        return $abouttop->save()?redirect()->back()->with(['success'=>'Form saved successfully']): redirect()->back()->with(['failure'=>'form submission failed']);
    }

    public function missionindex(){

        Session::put('topmenu', 'about');
        Session::put('menu', 'mission');

        $mission = about_mission::first();
        return view('admin.about.mission.index', compact('mission'));
    }

    public function missionstore(Request $request)
    {
        $mission = about_mission::firstOrNew();
        $mission->title =$request->title;
        $mission->desc =$request->desc;
        $mission->description = $request->description;
        $mission->status = $request->status;
        if($request->hasfile('image')){
            $mission->image = $request->image->getClientOriginalName();
            $request->image->move(public_path('images/banner/'), $mission->image);
        }
        if($request->hasfile('img')){
            $mission->img = $request->img->getClientOriginalName();
            $request->img->move(public_path('images/banner/'), $mission->img);
        }
        return $mission->save()?redirect()->back()->with(['success'=>'Form saved successfully']): redirect()->back()->with(['failure'=>'form submission failed']);

    }
    public function visionindex()
    {
        Session::put('topmenu', 'about');
        Session::put('menu', 'vision');

        $aboutvision = about_vision::first();
        return view('admin.about.vision.index', compact('aboutvision'));
    }

    public function visionstore(Request $request)
    {
        $aboutvision = about_vision::firstOrNew();
        $aboutvision->title = $request-> title;
        $aboutvision->desc = $request-> desc;
        $aboutvision->description = $request-> description;
        $aboutvision->status = $request-> status;
        if($request->hasfile('image')){
            $aboutvision->image = $request->image->getClientOriginalName();
            $request->image->move(public_path('images/banner/'), $aboutvision->image);
        }
        return $aboutvision->save()?redirect()->back()->with(['success'=>'Form saved successfully']): redirect()->back()->with(['failure'=>'form submission failed']);
    }


}

       

        

