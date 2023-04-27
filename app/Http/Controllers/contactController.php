<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\contact;
use Session;

class contactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Session::put('topmenu', 'contact');

        $contact = contact::first();
        return view('admin.contact.index', compact('contact'));
       
    }

    public function store(Request $request)
    {
        $contact = contact::firstOrNew();
        $contact->map =$request->map;

        return $contact->save()?redirect()->back()->with(['success'=>'Form saved successfully']): redirect()->back()->with(['failure'=>'form submission failed']);
 
    }

 
}
