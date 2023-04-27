<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\homebanner;
use App\Models\highlights;
use App\Models\home_about;
use App\Models\home_value;
use App\Models\home_eventTitle;
use App\Models\home_event;
use App\Models\home_valueTitle;
use App\Models\home_courses;
use App\Models\home_courseTitle;
use App\Models\home_staff;
use App\Models\home_staffTitle;
use App\Models\home_news;
use App\Models\home_newsTitle;
use App\Models\home_say;
use App\Models\home_sayTitle;
use App\Models\home_logos;
use App\Models\home_logoTitle;
use App\Models\footer;
use App\Models\about_topbanner;
use App\Models\about_banner;
use App\Models\about_mission;
use App\Models\about_vision;
use App\Models\contact;
use App\Models\contact_us;
use App\Models\branch;
use App\Models\branch_title;
use App\Models\gallerytitle;
use App\Models\gallery;
use Mail;
use App\Mail\ForMail;


class visitorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        $homeslider = homebanner::all();
        $homehighlights = highlights::all();
        $visitor_homeabout = home_about::firstOrNew();
        $visitor_homevalue = home_value::all();
        $visitor_homecoursetitle = home_courseTitle::firstOrNew();
        $visitor_homecourse = home_courses::where("status",0)->get();
        $visitor_homeeventtitle = home_eventTitle::firstOrNew();
        $visitor_homeevent = home_event::all();
        $visitor_homestafftitle = home_staffTitle::firstOrNew();
        $visitor_homestaff = home_staff::all();
        $visitor_homenewstitle = home_newsTitle::firstOrNew();
        $visitor_homenews = home_news::where("status",0)->get();
        $visitor_homesaytitle = home_sayTitle::firstOrNew();
        $visitor_homesay = home_say::where("status",0)->get();
        $visitor_homelogotitle =  home_logoTitle::firstOrNew();
        $visitor_homelogo = home_logos::where("status",0)->get();
        $visitor_branch = branch::all();
        $visitor_branchtitle = branch_title::firstOrNew();

        return view('visitor.index', compact('homeslider','homehighlights','visitor_homeabout', 'visitor_homevalue',
            'visitor_homecourse','visitor_homecoursetitle', 'visitor_homeevent','visitor_homeeventtitle','visitor_homestafftitle',
            'visitor_homestaff','visitor_homenewstitle','visitor_homenews', 'visitor_homesaytitle',
            'visitor_homesay','visitor_homelogotitle','visitor_homelogo','visitor_branchtitle','visitor_branch'));
    }  

    public function about()
    {
        $visitor_aboutbanner = about_topbanner::where("relation", 'about')->first();
        $visitor_history = about_banner::firstOrNew();
        $visitor_mission = about_mission::firstOrNew();
        $visitor_vision = about_vision::firstOrNew();
        $visitor_homestaff = home_staff::all();
        $visitor_homestafftitle = home_staffTitle::firstOrNew();
        $visitor_homelogotitle =  home_logoTitle::firstOrNew();
        $visitor_homelogo = home_logos::where("status",0)->get();
        $visitor_homesaytitle = home_sayTitle::firstOrNew();
        $visitor_homesay = home_say::where("status",0)->get();

        return view('visitor.about' ,compact('visitor_homesaytitle','visitor_homesay','visitor_homelogo','visitor_homelogotitle','visitor_aboutbanner','visitor_history','visitor_mission','visitor_vision','visitor_homestaff','visitor_homestafftitle'));
    }

    public function contact()
    {
        $visitor_contactbanner = about_topbanner::where("relation", 'contact')->first();
        $visitor_homelogotitle =  home_logoTitle::firstOrNew();
        $visitor_homelogo = home_logos::where("status",0)->get();
        $visitor_map= contact::firstOrNew();
        $contact_form = contact_us::all();
        return view('visitor.contact', compact('contact_form','visitor_map','visitor_homelogotitle','visitor_homelogo','visitor_contactbanner'));

    }

    public function storecontact(Request $request){

        $contact_form = new contact_us;
        $mailData = [
        'fname' => $contact_form->fname = $request->fname,
        'lname' => $contact_form->lname = $request->lname,
        'email' => $contact_form->email = $request->email,
        'subject' => $contact_form->subject = $request->subject,
        'message' => $contact_form->message = $request->message
        ];
        
        print_r($mailData);
        Mail::to('ishanpoudel58@gmail.com')->send(new \App\Mail\ForMail($mailData));
           
        return $contact_form->save()?redirect()->back()->with(['success'=>'Form Saved Successfully']): redirect()->back()->with(['failure'=>'Form Submit Failed']);



    }

    public function blog()
    {
        $visitor_blogbanner = about_topbanner::where("relation", 'blog')->first();
        $visitor_homenews = home_news::where("status",0)->paginate(3);

        return view('visitor.blog', compact('visitor_blogbanner','visitor_homenews'));
    }

    public function blogdetails($id)
    {
        $visitor_blogdetailsbanner = about_topbanner::where("relation", 'blogdetails')->first();
        $visitor_details = home_news::findOrFail($id);
        $blog_details = home_news::paginate(4);
        return view('visitor.blogdetails', compact('blog_details','visitor_details','visitor_blogdetailsbanner'));
    }

    public function event()
    {
        $visitor_eventbanner = about_topbanner::where("relation", 'event')->first();
        $visitor_event =  home_event::paginate(4);

        return view ('visitor.event', compact('visitor_eventbanner','visitor_event'));
    }

    public function eventdetails($id)
    {
        $visitor_eventdetailsbanner = about_topbanner::where("relation", 'eventdetails')->first();
        $visitor_eventdetails = home_event::findOrFail($id);
        $event_details = home_event::paginate(4);
        return view ('visitor.eventdetails', compact('visitor_eventdetailsbanner','visitor_eventdetails','event_details'));
    }

    public function gallery()
    {
        $visitor_gallerybanner = about_topbanner::where("relation", 'gallery')->first();
        $visitor_gallery = gallery::where("status",0)->paginate(6);

        return view('visitor.gallery', compact('visitor_gallerybanner','visitor_gallery'));
    }

    public function service()
    {
        $visitor_servicebanner = about_topbanner::where("relation", 'service')->first();
        $visitor_service = home_courses::where("status",0)->paginate(3);

        return view('visitor.service', compact('visitor_servicebanner','visitor_service'));
    }

    public function servicedetails($id)
    {
        $visitor_servicedetailsbanner = about_topbanner::where("relation", 'servicedetails')->first();
        $visitor_servicedetails = home_courses::findOrFail($id);
        $service_details = home_courses::where("status",0)->paginate(4);
        return view ('visitor.servicedetails', compact('visitor_servicedetailsbanner','visitor_servicedetails','service_details'));
    }
    
}
