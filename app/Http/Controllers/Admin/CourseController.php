<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class CourseController extends Controller
{

    public function index()
    {
        $courses = DB::table('courses')->get();

        return view('admin.course.index', compact('courses'));
    }

    public function add()
    {
        return view("admin.course.add");
    }
    public function save(Request $request)
{
    // Validate the request
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'faculty' => 'required|string|max:255',
        'long_des' => 'required|string',
        'short_des' => 'required|string',
        'image' => 'required|image|max:2048', // Validates it's an image and limits size
    ]);

    // Create new course
    $course = new Course();
    $course->name = $request->name;
    $course->faculty = $request->faculty;
    $course->long_des = $request->long_des;
    $course->short_des = $request->short_des;
    $course->image = $request->image->store('uploads/product');
    $course->save();

    $id = $course->id; //  ID of the newly created course

    // Clear related caches
    Cache::forget('home_course');
    Cache::forget("course_{$id}");
    Cache::forget("other_courses_except_{$id}");
    Cache::put('courses_last_updated', time());
    //Cache::forget("otcourse");
   // Cache::forget("alcourse");

    return redirect()->back()->with('message', 'Successfully Added');
}
    public function list(Request $request)
    {

        $courses = Course::all();

        return view("admin.course.index", compact('courses'));
    }
    public function del(Request $request, Course $course)
{
    $id = $course->id; // Store the ID before deletion

    // Delete the course
    $course->delete();

    // Clear all relevant cache entries
    Cache::forget('home_course');
    Cache::forget("course_{$id}");
    Cache::forget("other_courses_except_{$id}");
    Cache::put('courses_last_updated', time());



    return redirect()->back()->with('message', 'Successfully Deleted');
}
public function edit(Request $request, course $course)
{
    if ($request->getMethod() == "POST") {
        $course->name = $request->name;
        $course->faculty = $request->faculty;
        $course->long_des = $request->long_des;
        $course->short_des = $request->short_des;

        if ($request->hasFile('image')) {
            $course->image = $request->image->store('upload/course');
        }

        $course->save();

        // Clear relevant caches
        Cache::forget('home_course');
        Cache::forget("course_{$course->id}");
        Cache::forget("other_courses_except_{$course->id}");
        Cache::put('courses_last_updated', time());

        return redirect()->back()->with('message', 'Successfully Updated');
    } else {
        return view("admin.course.edit", compact('course'));
    }
}

    public function showCoursesOnNewPage()
    {
        $courses = Course::all(); // Fetch all courses
        return view('newPage.index', compact('courses')); // Send to newPage/index.blade.php
    }

}
