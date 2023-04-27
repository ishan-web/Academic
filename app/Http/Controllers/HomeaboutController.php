<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\home_about;
use App\Models\home_value;
use App\Models\home_event;
use App\Models\home_eventTitle;
use App\Models\home_valueTitle;
use Session;
use Image;

class HomeaboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        Session::put('topmenu', 'home');
        Session::put('menu', 'homeabout');

        $homeabout= home_about::first();
        return view('admin.home.about.index', compact('homeabout'));
    }

    public function store(Request $request)
    {
        $homeabout= home_about::firstOrNew();
        $homeabout->top = $request->top;
        $homeabout->desc = $request->desc;
        $homeabout->status = $request->status;
        if($request->hasFile('image')){
            $homeabout->image = time() .$request->image->getClientOriginalName();
            $request->image->move(public_path('images/banner/'), $homeabout->image);
        }
        $homeabout->title = $request->title;
        $homeabout->description = $request->description;

        return $homeabout->save()?redirect()->back()->with(['success'=>'Form saved successfully']): redirect()->back()->with(['failure'=>'form submission failed']);
    }

    public function indexValue()
    {
        Session::put('topmenu', 'home');
        Session::put('menu', 'homevalue');

        $homevalue= home_value::all();
        return view('admin.home.value.index', compact('homevalue',));
    }  

    public function storeValue(Request $request)
    {
        $id= $request->id;
        if($id ==""){
            $homevalue = new home_value;
            $homevalue->title= $request->title;
            $homevalue->desc= $request->desc;

            return $homevalue->save()?redirect()->back()->with(['success'=>'Form added sucessfully']): redirect()->back()->with(['failure'=>'Form submittion failed']);
        }
        else{
            $homevalue= home_value::findOrFail($id);
            $homevalue->title = $request->title;
            $homevalue->desc = $request->desc;

            return $homevalue->save()?redirect()->back()->with(['success'=>'Form updated sucessfully']): redirect()->back()->with(['failure'=>'Form update failed']);
        }
    }

    public function destroyValue(string $id)
    {
        $homevalue = home_value::findOrFail($id);
        return $homevalue->delete()?redirect()->back()->with(['success'=>'Form deleted succssfully']): redirect()->back()->with(['failure'=>'Form deletion failed']);
    }

    public function indexEvent()
    {
        Session::put('topmenu', 'home');
        Session::put('menu','homeevent');

        $event = home_event::all();        
        $homeeventtitle = home_eventTitle::first();
        return view('admin.home.event.index', compact('event', 'homeeventtitle'));
    }

    public function storeEvent(Request $request)
    {
        $event = new home_event;
        $event->title = $request->title;
        $event->date = $request->date;
        $event->desc = $request->desc;
        if($request->hasfile('image')){
            $imagename=time().'image.'.$request->file('image')->getClientOriginalExtension();
            if($request->image_data==null){
                $request->file('image')->move(public_path('images/banner'), $imagename);
            }else{
                $imagedata=json_decode($request->image_data,true);
                $image=Image::make($request->file('image'));
                $image->crop($imagedata['width'],$imagedata['height'],$imagedata['x'],$imagedata['y']);
                $image->save(public_path('images/banner/'.$imagename));
            }
            $event->image = $imagename;
    }
    return $event->save()?redirect()->back()->with(['success'=>'Form added sucessfully']) : rediect()->back()->with(['failure'=>'Form submission failed']);

}

    public function editEvent(string $id)
    {
        $event = home_event::findOrFail($id);
        return view('admin.home.event.edit', compact('event'));
    }
    public function updateEvent(Request $request, string $id)
    {   
        $event =  home_event::findOrFail($id);
        $event->title = $request->title;
        $event->date = $request->date;
        $event->desc = $request->desc;
        if($request->hasfile('image')){
            @unlink(public_path('images/banner/'.$event->image));
            $imagename=time().'image.'.$request->file('image')->getClientOriginalExtension();
            if($request->image_data==null){
                $request->file('image')->move(public_path('images/banner/'),$imagename);
            }else{
                $imagedata=json_decode($request->image_data,true);
                $image=Image::make($request->file('image'));
                $image->crop($imagedata['width'],$imagedata['height'],$imagedata['x'],$imagedata['y']);
                $image->save(public_path('images/banner/'.$imagename));
            }
            $event->image = $imagename;
        }
        return $event->save()?redirect()->back()->with(['success'=>'Form Updated Successfully']): redirect()->back()->with(['failure'=>'Form Submit Failed']);
    }

    public function destroyEvent(string $id)
    {
        $event = home_event::findOrFail($id);
        return $event->delete()?redirect()->back()->with(['success'=>'Form deleted succesfully']): redirect()->back()->with(['failed'=>'Form deletion failed']);
    }

    public function storeEventtitle(Request $request)
    {
        $homeeventtitle= home_eventTitle::firstOrNew();
        $homeeventtitle->title = $request->title;
        $homeeventtitle->desc = $request->desc;
        $homeeventtitle->status = $request->status;

        return $homeeventtitle->save()?redirect()->back()->with(['success'=>'Form added sucessfully']): redirect()->back()->with(['failure'=>'Form submittion failed']);

    }
}

