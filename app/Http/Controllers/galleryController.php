<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\gallerytitle;
use App\Models\gallery;
use Session;
use Image;


class galleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        Session::put('topmenu', 'gallery');

        $gallery = gallery::all();
        $gallerytitle = gallerytitle::first();
        return view ('admin.gallery.index', compact('gallerytitle','gallery'));
    }

    public function storeTitle(Request $request)
    {
        $gallerytitle = gallerytitle::firstOrNew();
        $gallerytitle->title = $request-> title;
        $gallerytitle->desc = $request->desc;

        return $gallerytitle->save()?redirect()->back()->with(['success'=>'Form saved Successfully']) : redirect()->back()->with(['failure' => 'Form submission failed']);
    }
    public function store(Request $request)
    {
        $gallery = new gallery;
        $gallery->title = $request->title;
        $gallery->desc = $request->desc;
        $gallery->status = $request->status;
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
            $gallery->image =$imagename;
        }
        return $gallery->save()?redirect()->back()->with(['success'=>'Form saved Successfully']) : redirect()->back()->with(['failure' => 'Form submission failed']);

    }

    public function edit(string $id)
    {
        $gallery = gallery::findOrFail($id);
        return view ('admin.gallery.edit', compact('gallery'));
    }


    public function update(Request $request, string $id)
    {
        $gallery = gallery::findOrFail($id);
        $gallery->title = $request->title;
        $gallery->desc = $request->desc;
        $gallery->status = $request->status;
        if($request->hasfile('image')){
            @unlink(public_path('images/banner/'.$gallery->image));
            $imagename=time().'image.'.$request->file('image')->getClientOriginalExtension();
            if($request->image_data==null){
                $request->file('image')->move(public_path('images/banner'),$imagename);
            }else{
                $imagedata=json_decode($request->image_data,true);
                $image=Image::make($request->file('image'));
                $image->crop($imagedata['width'],$imagedata['height'],$imagedata['x'],$imagedata['y']);
                $image->save(public_path('images/banner/'.$imagename));
            }
            $gallery->image =$imagename;
        }
        return $gallery->save()?redirect()->back()->with(['success'=>'Form saved Successfully']) : redirect()->back()->with(['failure' => 'Form submission failed']);
    }

    public function destroy(string $id)
    {
        $gallery = gallery::findOrFail($id);
        return $gallery->delete()?redirect()->back()->with(['success'=>'Form deleted succesfully']): redirect()->back()->with(['failed'=>'Form deletion failed']);
    }
}
