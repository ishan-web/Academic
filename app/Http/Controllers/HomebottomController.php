<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\home_staff;
use App\Models\home_staffTitle;
use App\Models\home_news;
use App\Models\home_newsTitle;
use App\Models\home_say;
use App\Models\home_sayTitle;
use App\Models\home_logos;
use App\Models\home_logoTitle;
use App\Models\footer;

use Session;
use Image;


class HomebottomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexStaff()
    {
        Session::put('topmenu', 'home');
        Session::put('menu','homestaff');

        $homestaff = home_staff::all();
        $homestafftitle = home_staffTitle::first();
        return view('admin.home.staff.index', compact('homestaff','homestafftitle'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeStaff(Request $request)
    {
        $homestaff = new home_staff();
        $homestaff->title = $request->title;
        $homestaff->desc = $request->desc;
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
            $homestaff->image = $imagename;
        }
        return $homestaff->save()?redirect()->back()->with(['success'=>'Form added sucessfully']) : rediect()->back()->with(['failure'=>'Form submission failed']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editStaff(string $id)
    {
        $homestaff = home_staff::findOrFail($id);
        return view('admin.home.staff.edit', compact('homestaff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateStaff(Request $request, string $id)
    {
        $homestaff = home_staff::findOrFail($id);
        $homestaff->title = $request->title;
        $homestaff->desc = $request->desc;
        if($request->hasfile('image')){
            @unlink(public_path('images/banner/' .$homebanner->image));
            $imagename=time().'image.'.$request->file('image')->getClientOriginalExtension();
            if($request->image_data==null){
                $request->file('image')->move(public_path('images/banner/'),$imagename);
            }else{
                $imagedata=json_decode($request->image_data,true);
                $image=Image::make($request->file('image'));
                $image->crop($imagedata['width'],$imagedata['height'],$imagedata['x'],$imagedata['y']);
                $image->save(public_path('images/banner/'.$imagename));
            }
            $homestaff->image = $imagename;
        }
        return $homestaff->save()?redirect()->back()->with(['success'=>'Form Updated Successfully']): redirect()->back()->with(['failure'=>'Form Submit Failed']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyStaff(string $id)
    {
        $homestaff = home_staff::findOrFail($id);
        return $homestaff->delete()?redirect()->back()->with(['success'=>'Form deleted succesfully']): redirect()->back()->with(['failed'=>'Form deletion failed']);
    }

    public function storeStafftitle(Request $request)
    {
        $homestafftitle= home_staffTitle::firstOrNew();
        $homestafftitle->title = $request->title;
        $homestafftitle->desc = $request->desc;
        $homestafftitle->status = $request->status;
        $homestafftitle->stat = $request->stat;


        return $homestafftitle->save()?redirect()->back()->with(['success'=>'Form added sucessfully']): redirect()->back()->with(['failure'=>'Form submittion failed']);

    }

    public function indexNews()
    {
        Session::put('topmenu', 'home');
        Session::put('menu','homenews');

        $homenews = home_news::all();
        $homenewstitle = home_newsTitle::first();
        return view('admin.home.news.index', compact('homenews', 'homenewstitle'));
    }
    public function storeNews(Request $request){
        $homenews= new home_news;
        $homenews->title = $request-> title;
        $homenews->desc = $request->desc;
        $homenews->date = $request->date;
        $homenews->status = $request->status;
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
            $homenews->image = $imagename;
        }
        return $homenews->save()?redirect()->back()->with(['success'=>'Form added sucessfully']) : rediect()->back()->with(['failure'=>'Form submission failed']);

    }

    public function editNews(string $id)
    {
        $homenews = home_news::findOrFail($id);
        return view('admin.home.news.edit', compact('homenews'));
    }

    public function updateNews(Request $request, string $id)
    {
        $homenews= home_news::findOrFail($id);
        $homenews->title = $request-> title;
        $homenews->desc = $request->desc;
        $homenews->date = $request->date;
        $homenews->status = $request->status;
        if($request->hasfile('image')){
            @unlink(public_path('images/banner/'.$homenews->image));
            $imagename=time().'image.'.$request->file('image')->getClientOriginalExtension();
            if($request->image_data==null){
                $request->file('image')->move(public_path('images/banner'), $imagename);
            }else{
                $imagedata=json_decode($request->image_data,true);
                $image=Image::make($request->file('image'));
                $image->crop($imagedata['width'],$imagedata['height'],$imagedata['x'],$imagedata['y']);
                $image->save(public_path('images/banner/'.$imagename));
            }
            $homenews->image = $imagename;
        }
        return $homenews->save()?redirect()->back()->with(['success'=>'Form added sucessfully']) : rediect()->back()->with(['failure'=>'Form submission failed']);

    }
    public function destroyNews(string $id)
    {
        $homenews = home_news::findOrFail($id);
        return $homenews->delete()?redirect()->back()->with(['success'=>'Form deleted succesfully']): redirect()->back()->with(['failed'=>'Form deletion failed']);
    }

    public function storeNewstitle(Request $request)
    {
        $homenewstitle= home_newsTitle::firstOrNew();
        $homenewstitle->title = $request->title;
        $homenewstitle->desc = $request->desc;
        $homenewstitle->status = $request->status;


        return $homenewstitle->save()?redirect()->back()->with(['success'=>'Form added sucessfully']): redirect()->back()->with(['failure'=>'Form submittion failed']);
    }

    public function indexSay()
    {
        Session::put('topmenu', 'home');
        Session::put('menu','homesay');

        $homesaytitle = home_sayTitle::first();
        $homesay = home_say::all();
        return view('admin.home.say.index', compact('homesay','homesaytitle'));
    }
    public function storeSay(Request $request){
        $homesay= new home_say;
        $homesay->title = $request-> title;
        $homesay->desc = $request->desc;
        $homesay->status = $request->status;
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
            $homesay->image = $imagename;
        }
        return $homesay->save()?redirect()->back()->with(['success'=>'Form added sucessfully']) : rediect()->back()->with(['failure'=>'Form submission failed']);

    }

    public function editSay(string $id){

        $homesay = home_say::findOrFail($id);
        return view('admin.home.say.edit', compact('homesay'));
    }
    public function updateSay(Request $request, string $id)
    {
        $homesay = home_say::findOrFail($id);
        $homesay->title = $request-> title;
        $homesay->desc = $request->desc;
        $homesay->status = $request->status;
        if($request->hasfile('image')){
            @unlink(public_path('images/banner/'.$homesay->image));
            $imagename=time().'image.'.$request->file('image')->getClientOriginalExtension();
            if($request->image_data==null){
                $request->file('image')->move(public_path('images/banner'), $imagename);
            }else{
                $imagedata=json_decode($request->image_data,true);
                $image=Image::make($request->file('image'));
                $image->crop($imagedata['width'],$imagedata['height'],$imagedata['x'],$imagedata['y']);
                $image->save(public_path('images/banner/'.$imagename));
            }
            $homesay->image = $imagename;
        }
        return $homesay->save()?redirect()->back()->with(['success'=>'Form Updated sucessfully']) : rediect()->back()->with(['failure'=>'Form submission failed']);
    }
    public function destroySay(string $id)
    {
        $homesay = home_say::findOrFail($id);
        return $homesay->delete()?redirect()->back()->with(['success'=>'Form deleted succesfully']): redirect()->back()->with(['failed'=>'Form deletion failed']);
    }
    public function storeSaytitle(Request $request)
    {
        $homesaytitle= home_sayTitle::firstOrNew();
        $homesaytitle->title = $request->title;
        $homesaytitle->desc = $request->desc;
        $homesaytitle->status = $request->status;
        $homesaytitle->stat = $request->stat;

        return $homesaytitle->save()?redirect()->back()->with(['success'=>'Form added sucessfully']): redirect()->back()->with(['failure'=>'Form submittion failed']);
    }  

    public function indexLogo()
    {
        Session::put('topmenu', 'partner');

        $homelogo = home_logos::all();
        $homelogotitle = home_logoTitle::first();
        return view('admin.home.logo.index', compact('homelogo', 'homelogotitle'));
    }
    public function storeLogo(Request $request)
    {
        $homelogo = new home_logos;
        $homelogo->title = $request-> title;
        $homelogo->status = $request-> status;
        $homelogo->url = $request-> url;
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
            $homelogo->image =$imagename;
        }
        return $homelogo->save()?redirect()->back()->with(['success'=>'Form saved successfully']): redirect()->back()->with(['failure'=>'Form submission failed']);
        }
    public function editLogo(string $id)
    {
        $homelogo = home_logos::findOrFail($id);
        return view('admin.home.logo.edit', compact('homelogo'));
    }

    public function updateLogo(Request $request, string $id)
    {
        $homelogo = home_logos::findOrFail($id);
        $homelogo->status = $request->status;
        $homelogo->title = $request->title;
        $homelogo->url = $request->url;
        if($request->hasfile('image')){
            @unlink(public_path('images/banner'.$homelogo->image));
            $imagename= time().'image.'.$request->file('image')->getClientOriginalExtension();
            if($request->image_data==null){
                $request->file('image')->move(public_path('images/banner', $imagename));
            }else{
                $imagedata=json_decode($request->image_data,true);
                $image=Image::make($request->file('image'));
                $image->crop($imagedata['width'],$imagedata['height'],$imagedata['x'],$imagedata['y']);
                $image->save(public_path('images/banner/'.$imagename));
            }
            $homelogo->image =$imagename;
        }
        return $homelogo->save()?redirect()->back()->with(['success'=>'Form Saved Successfully']): redirect()->back()->with(['failure'=>'Form Submit Failed']);
    }
    public function destroyLogo( string $id)
    {
        $homelogo = home_logos::findOrFail($id);
        return $homelogo->delete()?redirect()->back()->with(['success'=>'Form deleted succesfully']): redirect()->back()->with(['failed'=>'form deletion failed']);
    }
    public function storeLogotitle(Request $request)
    {
        $homelogotitle= home_logoTitle::firstOrNew();
        $homelogotitle->title = $request->title;
        $homelogotitle->desc = $request->desc;
        $homelogotitle->status = $request->status;
        $homelogotitle->stat = $request->stat;
        $homelogotitle->stats = $request->stats;

        return $homelogotitle->save()?redirect()->back()->with(['success'=>'Form added sucessfully']): redirect()->back()->with(['failure'=>'Form submittion failed']);
    } 

    public function index()
    {

        Session::put('topmenu', 'footer');

        $footer= footer::first();
        return view('admin.home.footer.index', compact('footer'));
    }

    public function store(Request $request)
    {
        $footer= footer::firstOrNew();
        $footer->desc = $request->desc;
        $footer->image = $request->image->getClientOriginalName();
        $request->image->move(public_path('images/banner'), $footer->image);
        $footer->title = $request->title;

        return $footer->save()?redirect()->back()->with(['success'=>'Form saved successfully']): redirect()->back()->with(['failure'=>'form submission failed']);
    }
}
