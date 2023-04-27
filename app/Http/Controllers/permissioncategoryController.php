<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\permissioncategory;
use Session;

class permissioncategoryController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:percategory-list|percategory-create|percategory-edit|percategory-delete', ['only' => ['index','store']]);
         $this->middleware('permission:percategory-create', ['only' => ['create','store']]);
         $this->middleware('permission:percategory-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:percategory-delete', ['only' => ['destroy']]);
    }
    
    public function index()
    {
        Session::put('topmenu','setting');
        Session::put('menu','permission_group');
        $list = permissioncategory::all();
        return view('admin.percategory.index',compact('list'));
    }

    public function store(Request $request)
    {
        $id = $request->id;
        if($id==""){
            $percategory = new permissioncategory;
            $percategory->name = $request->name;
            return $percategory->save()?redirect()->back()->with('success','Permission Category Added Successfully') : redirect()->back()->with('failure','Permission Category Adding Failed');
        }else{
            $percategory = permissioncategory::findOrFail($id);
            $percategory->name = $request->name;
            return $percategory->save()?redirect()->back()->with('success','Permission Category Updated Successfully') : redirect()->back()->with('failure','Permission Category Updating Failed');
        }
    }

    public function destroy(string $id)
    {
        $percategory = permissioncategory::findOrFail($id);
        return $percategory->delete()?redirect()->back()->with('success','Permission Category Deleted Successfully') : redirect()->back()->with('failure','Permission Category Deletion Failed');
    }
}
