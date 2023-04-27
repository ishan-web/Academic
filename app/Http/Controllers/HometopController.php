<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\homebanner;
use App\Models\highlights;
use App\Models\home_courses;
use App\Models\home_courseTitle;
use Session;
use Image;

class HometopController extends Controller
{

    public function index()
    {
        Session::put('topmenu','home');
        Session::put('menu','topbanner');

        $homebanner = homebanner::all();
        return view('admin.home.topbanner.index', compact('homebanner'));
    }
    public function store(Request $request)
    {
        $homebanner = new homebanner;
        $homebanner->title = $request->title;
        $homebanner->desc = $request->desc;
        if($request->hasfile('image')){
            $imagename=time().'image.'.$request->file('image')->getClientOriginalExtension();
            if($request->image_data==null){
                $request->file('image')->move(public_path('images/banner'),$imagename);
            }else{
                $imagedata=json_decode($request->image_data,true);
                $image=Image::make($request->file('image'));
                $image->crop($imagedata['width'],$imagedata['height'],$imagedata['x'],$imagedata['y']);
                $image->save(public_path('images/banner/'.$imagename));
            }
            $homebanner->image = $imagename;
    }
    return $homebanner->save()?redirect()->back()->with(['success'=>'Form saved sucessfully']) : rediect()->back()->with(['failure'=>'Form submission failed']);

}

    public function edit(string $id){
        $homebanner = homebanner::findOrFail($id);
        return view('admin.home.topbanner.edit', compact('homebanner'));
    }

    public function update(Request $request, string $id)
    {
        $homebanner = homebanner::findOrFail($id);
        $homebanner->title = $request->title;
        $homebanner->desc = $request->desc;
        if($request->hasfile('image')){
            @unlink(public_path('images/banner/'.$homebanner->image));
            $imagename=time().'image.'.$request->file('image')->getClientOriginalExtension();
            if($request->image_data==null){
                $request->file('image')->move(public_path('images/banner/'),$imagename);
            }else{
                $imagedata=json_decode($request->image_data,true);
                $image=Image::make($request->file('image'));
                $image->crop($imagedata['width'],$imagedata['height'],$imagedata['x'],$imagedata['y']);
                $image->save(public_path('images/banner/'.$imagename));
            }
            $homebanner->image = $imagename;
        }
        return $homebanner->save()?redirect()->back()->with(['success'=>'Form Saved Successfully']): redirect()->back()->with(['failure'=>'Form Submit Failed']);
    }
    public function destroy(string $id){
        $homebanner = homebanner::findOrFail($id);
        return $homebanner->delete()?redirect()->back()->with(['success'=>'form deleted successfully']): redirect()->back()->with(['failure'=>'Form delete failure']);
    }

    public function indexHigh(){

        Session::put('topmenu', 'home');
        Session::put('menu','highlights');

        $highlights = highlights::all();
        return view('admin.home.highlights.index', compact('highlights'));
    }

    public function storeHigh(Request $request)
    {
        $highlights = new highlights;
        $highlights->icon= $request->icon;
        $highlights->topic= $request->topic;
        $highlights->description=$request->description;

        return $highlights->save()?redirect()->back()->with(['success'=>'form saved sucessfully']) : redirect()->back()->with(['failed'=>'form submission failed']);
    }

    public function editHigh(string $id)
    {
        $highlights = highlights::findOrFail($id);
        return view('admin.home.highlights.edit', compact('highlights'));
    }
    public function updateHigh(Request $request, string $id)
    {
        $highlights = highlights::findOrFail($id);
        $highlights->icon= $request->icon;
        $highlights->topic= $request->topic;
        $highlights->description=$request->description;

        return $highlights->save()?redirect()->back()->with(['success'=>'form saved sucessfully']) : redirect()->back()->with(['failed'=>'form submission failed']);

    }

    public function destroyHigh(string $id)
    {
        $highlights = highlights::findOrFail($id);
        return $highlights->delete()?redirect()->back()->with(['success'=>'form deleted succesfully']): redirect()->back()->with(['failed'=>'form deletion failed']);
    }

    public function indexCourse()
    {
        Session::put('topmenu', 'home');
        Session::put('menu','courses');

        $courseTitle= $courseTitle = home_courseTitle::first();
        $course = home_courses::all();
        return view('admin.home.courses.index', compact('course', 'courseTitle'));
    }

    public function storeCourse(Request $request)
    {
        $course = new home_courses;
        $course->subject = $request->subject;
        $course->desc = $request->desc;
        $course->status = $request->status;
        if($request->hasfile('img')){
            $imagename=time().'img.'.$request->file('img')->getClientOriginalExtension();
            if($request->image_data==null){
                $request->file('img')->move(public_path('images/banner'),$imagename);
            }else{
                $imagedata=json_decode($request->image_data,true);
                $image=Image::make($request->file('img'));
                $image->crop($imagedata['width'],$imagedata['height'],$imagedata['x'],$imagedata['y']);
                $image->save(public_path('images/banner/'.$imagename));
            }
            $course->img = $imagename;
    }
    return $course->save()?redirect()->back()->with(['success'=>'Form saved successfully']) : rediect()->back()->with(['failure'=>'Form submission failed']);

}

    public function editCourse(string $id)
    {
        $course = home_courses::findOrFail($id);
        return view('admin.home.courses.edit', compact('course'));
    }
    public function updateCourse(Request $request, string $id)
    {
        $course = home_courses::findOrFail($id);
        $course->subject = $request->subject;
        $course->desc = $request->desc;
        $course->status = $request->status;
        if($request->hasfile('img')){
            @unlink(public_path('images/banner/'.$course->img));
            $imagename=time().'img.'.$request->file('img')->getClientOriginalExtension();
            if($request->image_data==null){
                $request->file('img')->move(public_path('images/banner/'),$imagename);
            }else{
                $imagedata=json_decode($request->image_data,true);
                $image=Image::make($request->file('img'));
                $image->crop($imagedata['width'],$imagedata['height'],$imagedata['x'],$imagedata['y']);
                $image->save(public_path('images/banner/'.$imagename));
            }
            $course->img = $imagename;
        }
        return $course->save()?redirect()->back()->with(['success'=>'Form Saved Successfully']): redirect()->back()->with(['failure'=>'Form Submit Failed']);
    }

    public function destroyCourse( string $id)
    {
        $course = home_courses::findOrFail($id);
        return $course->delete()?redirect()->back()->with(['success'=>'form deleted succesfully']): redirect()->back()->with(['failed'=>'form deletion failed']);
    }


    public function storeCoursetitle(Request $request){
        $courseTitle = home_courseTitle::firstOrNew();
        $courseTitle->title = $request->title;
        $courseTitle->status = $request->status;    
        $courseTitle->desc = $request->desc;

        return $courseTitle->save()?redirect()->back()->with(['success' => 'Form saved successfully']) : redirect()->back()->with(['failed'=>'Form submittion failed']);

    }
}
