<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Models\permissioncategory;
use DB;
use Session;
class permissionController extends Controller
{

    public function index()
    {
        Session::put('topmenu','setting');
        Session::put('menu','permission');
        $percategory = permissioncategory::all();
        $permission = Permission::all();
        return view('admin.permission.index',compact('percategory','permission'));

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'category' => 'required',
        ]);
        $id = $request->id;
        if($id==""){
            
            $permission = new Permission;
            $permission->name = $request->name;
            $permission->permissioncategory_id= $request->category;
            $permission->guard_name = "web";
            return $permission->save()?redirect()->back()->with('success','Permission created successfully') : redirect()->back()->with('failure','Creating permission failed');
        }else{
            $permission = Permission::findOrFail($id);
            $permission->name = $request->name;
            $permission->permissioncategory_id= $request->category;
            $permission->guard_name = "web";
            return $permission->save()?redirect()->back()->with('success','Permission Edited successfully') : redirect()->back()->with('failure','Editing permission failed');
        }
    }

    public function destroy(string $id)
    {
        $permission = Permission::findOrFail($id);
        return $permission->delete()?redirect()->back()->with('success','Permission Deleted successfully') : redirect()->back()->with('failure','Deleting permission failed');
    }
}
