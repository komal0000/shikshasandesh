<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class TeacherController extends Controller
{
     public function index()
    {
        $teachers = Teacher::all();

        return view('admin.teacher.index', compact('teachers'));
    }
    public function add()
    {
        return view('admin.teacher.add');
    }
    public function save(Request $request)
    {
        $teacher  = new Teacher();
        $teacher->image = $request->image->store('uploads/product');
        $teacher->name = $request->name;
        $teacher->deg = $request->deg;
        $teacher->short_des = $request->short_des;
        $teacher->save();
        Cache::forget('home_teacher');
        Cache::forget('teacher_lists');
        Cache::forget('about_teacher');
        return redirect()->back()->with('message', 'Successfully Added');
        // return redirect()->route("admin.teacher.index");
    }
    public function list(Request $request)
    {

        $teachers = DB::table('teachers')->get();
        // dd($teachers);
        return view("admin.teacher.index" ,compact('teachers'));
    }
    public function del(Request $request, Teacher $teacher)
    {
        $teacher->delete();
        Cache::forget('home_teacher');
        Cache::forget('teacher_lists');
        Cache::forget('about_teacher');
        return redirect()->back()->with('message', 'Sucessfully Deleted');
    }
    public function edit(Request $request, Teacher $teacher)
    {
        if ($request->getMethod() == "POST") {
            $teacher->name = $request->name;
            $teacher->deg = $request->deg;
        $teacher->short_des = $request->short_des;
            if ($request->hasfile('image')) {
                $teacher->image = $request->image->store('upload/teacher');
            }
            $teacher->save();
            Cache::forget('home_teacher');
            Cache::forget('teacher_lists');
            Cache::forget('about_teacher');
            return redirect()->back()->with('message', 'Successfully Updated');
        } else {
            return view("admin.teacher.edit",compact('teacher'));
        }
    }
}

