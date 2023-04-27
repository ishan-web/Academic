<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\branch;
use App\Models\branch_title;
use Session;
use Image;

class branchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        Session::put('topmenu', 'home');
        Session::put('menu','branch');

        $branch = branch::all();
        $branchtitle = branch_title::first();
        return view('admin.home.branch.index', compact('branch','branchtitle'));
    }

    public function store(Request $request)
    {
        $branch = new branch;
        $branch ->title = $request->title;
        $branch->desc = $request->desc;
        $branch->description = $request->description;
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
            $branch->image = $imagename;
    }
    return $branch->save()?redirect()->back()->with(['success'=>'Form added sucessfully']) : rediect()->back()->with(['failure'=>'Form submission failed']);

    }

    public function edit(string $id)
    {
        $branch = branch::findOrFail($id);
        return view('admin.home.branch.edit', compact('branch'));
    }

    public function update(Request $request, string $id)
    {
        $branch = new branch;
        $branch ->title = $request->title;
        $branch->desc = $request->desc;
        $branch->description = $request->description;
        if($request->hasfile('image')){
            @unlink(public_path('images/banner/'.$branch->image));
            $imagename=time().'image.'.$request->file('image')->getClientOriginalExtension();
            if($request->image_data==null){
                $request->file('image')->move(public_path('images/banner'), $imagename);
            }else{
                $imagedata=json_decode($request->image_data,true);
                $image=Image::make($request->file('image'));
                $image->crop($imagedata['width'],$imagedata['height'],$imagedata['x'],$imagedata['y']);
                $image->save(public_path('images/banner/'.$imagename));
            }
            $branch->image = $imagename;
    }
    return $branch->save()?redirect()->back()->with(['success'=>'Form added sucessfully']) : rediect()->back()->with(['failure'=>'Form submission failed']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $branch = branch::findOrFail($id);
        return $branch->delete()?redirect()->back()->with(['success'=>'Form deleted succesfully']): redirect()->back()->with(['failed'=>'Form deletion failed']);
    }

    public function storeTitle(Request $request)
    {
        $branchtitle = branch_title::firstOrNew();
        $branchtitle->title = $request->title;
        $branchtitle->desc = $request->desc;
        $branchtitle->status = $request-> status;

        return $branchtitle->save()?redirect()->back()->with(['success'=>'Form added sucessfully']): redirect()->back()->with(['failure'=>'Form submittion failed']);

    }
}
