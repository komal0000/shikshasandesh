<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class cobassController extends Controller
{
    public function index()
    {

        $courses = DB::table('courses')->get();
        $teachers = DB::table('teachers')->get();
        $testimonials = DB::table('testimonials')->get();
        return view('front.index',compact('teachers','courses','testimonials'));

    }
    public function about()
    {
        return view('front.about');
    }
    public function course()
    {
        return view('front.course');
    }
    public function contact()
    {
        return view('front.contact');
    }
    public function team()
    {
        return view('front.team');
    }
    public function testimonial()
    {
        return view('front.testimonial');
    }

    public function error()
    {
        return view('front.error');
    }
}
