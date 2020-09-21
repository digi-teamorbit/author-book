<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\inquiry;
use App\schedule;
use App\newsletter;
use App\post;
use App\banner;
use App\review;
use App\imagetable;
use DB;
use Mail;use View;
use Session;
use App\Http\Helpers\UserSystemInfoHelper;
use App\Http\Traits\HelperTrait;
use Auth;
use App\Profile;


class HomeController extends Controller
{   
    use HelperTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     // use Helper;
     
    public function __construct()
    {
        //$this->middleware('auth');

        $logo = imagetable::
                     select('img_path')
                     ->where('table_name','=','logo')
                     ->first();
             
        $favicon = imagetable::
                     select('img_path')
                     ->where('table_name','=','favicon')
                     ->first(); 
        
        View()->share('logo',$logo);
        View()->share('favicon',$favicon);

    } 

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $banner = DB::table('banners')->get()->first();   
        
        $cms_home1 = DB::table('pages')->where('id', 1)->first();

        $products = DB::table('products')->get()->take(10);

        $latest_book=DB::table('pages')->where('id', 6)->first();
        $books=DB::table('books')->get();


        return view('welcome', compact('banner', 'cms_home1', 'latest_book', 'books'));
    }

    public function about()
    {
        $inner_banner1 = DB::table('inner_banners')->where('id', 1)->first();
        $author_name1=DB::table('pages')->where('id',2)->first();
        $author_name2=DB::table('pages')->where('id',3)->first();
        return view('about',compact('inner_banner1', 'author_name1','author_name2'));
    }

    public function myBook()
    {
        $inner_banner2 = DB::table('inner_banners')->where('id', 2)->first();
        $book=DB::table('pages')->where('id', 7)->first();
        return view('my-book',compact('inner_banner2', 'book'));
    }

    public function reviews()
    {
        $inner_banner3 = DB::table('inner_banners')->where('id', 3)->first();
        return view('reviews',compact('inner_banner3'));
    }

    public function storeReview(Request $request)
    {
             $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'review' => 'required'
        ]);

            $review = new review;
            $review->name = $request->name;
            $review->email = $request->email;
            $review->review = $request->review;
            
            $review->save();

            Session::flash('message', 'Thank you for the review.'); 
        Session::flash('alert-class', 'alert-success'); 
            return redirect('/');
        }
    
    

    public function contactUsSubmit(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'email' => 'required',
            'message' => 'required'
        ]);
        
        $inquiry = new inquiry;
        $inquiry->inquiries_fname = $request->name;
        $inquiry->inquiries_address = $request->address;
        $inquiry->inquiries_phone = $request->phone;
        $inquiry->inquiries_email = $request->email;
        $inquiry->extra_content = $request->message;
        $inquiry->save();
            
        Session::flash('message', 'Thank you for contacting us. We will get back to you asap'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect('/');
    }

    public function newsletterSubmit(Request $request)
    {
        $is_email = newsletter::where('newsletter_email',$request->email)->count();
        
        if($is_email == 0) {
            
        $inquiry = new newsletter;
        //$inquiry->newsletter_name = $request->name;
        $inquiry->newsletter_email = $request->email;
        //$inquiry->newsletter_message = $request->comment;
        $inquiry->save();
        Session::flash('message', 'Thank you for contacting us. We will get back to you asap'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect('/');
        
        } else {
            Session::flash('flash_message', 'email already exists'); 
            Session::flash('alert-class', 'alert-success'); 
            return redirect('/');
        }
        
    }
   
}
