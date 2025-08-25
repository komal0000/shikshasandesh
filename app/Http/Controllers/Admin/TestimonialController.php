<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Cache;


class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();

        return view('admin.testimonial.index', compact('testimonials'));
    }
    public function add()
    {
        return view('admin.testimonial.add');
    }
    public function save(Request $request)
    {
        $testimonial = new Testimonial();
        $testimonial->image =$request->image->store('uploads/product');
        $testimonial->name = $request->name;
        $testimonial->profission = $request->profission;
        $testimonial->long_des = $request->long_des;
        $testimonial->save();
        Cache::forget('home_testimonial');
        Cache::forget('about_testimonials');
        return redirect()->back()->with('message', 'Successfully Added');
    }
    public function list(Request $request)
    {

        $testimonials = Testimonial::all();
        // dd($testimonials);
        return view("admin.testimonial.index" ,compact('testimonials'));
    }
    public function del(Request $request, Testimonial $testimonial)
    {
        $testimonial->delete();
        Cache::forget('home_testimonial');
        Cache::forget('about_testimonials');
        return redirect()->back()->with('message', 'Sucessfully Deleted');
    }
    public function edit(Request $request, Testimonial $testimonial)
    {
        if ($request->getMethod() == "POST") {
            $testimonial->name = $request->name;
        $testimonial->profission = $request->profission;
        $testimonial->long_des = $request->long_des;
            if ($request->hasfile('image')) {
                $testimonial->image = $request->image->store('upload/testimonial');
            }
            $testimonial->save();
            Cache::forget('home_testimonial');
            Cache::forget('about_testimonials');
            return redirect()->back()->with('message', 'Successfully Updated');
        } else {
            return view("admin.testimonial.edit",compact('testimonial'));
        }
    }
}
