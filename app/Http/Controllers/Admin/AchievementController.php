<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class AchievementController extends Controller
{
    public function index()
    {
        $achievements = Achievement::all();
        return view('admin.achievements.index', compact('achievements'));
    }

    public function create()
    {
        return view('admin.achievements.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imagePath = $request->file('image')->store('uploads/achievements');

        Achievement::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath
        ]);
        Cache::forget('home_achieve');
        Cache::forget('achieve_lists');

        return redirect()->route('admin.achievements.create')->with('success', 'Achievement added successfully');
    }

    public function edit(Achievement $achievement)
    {
        return view('admin.achievements.edit', compact('achievement'));
    }

    public function update(Request $request, Achievement $achievement)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            // 'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $achievement->image = $request->file('image')->store('uploads/achievements');
        }

        $achievement->title= $request->title;
        $achievement->description = $request->description;
        $achievement->save();
        Cache::forget('home_achieve');
        Cache::forget('achieve_lists');

        return redirect()->route('admin.achievements.edit',['achievement'=>$achievement->id])->with('success', 'Achievement updated successfully');
    }

    public function destroy(Achievement $achievement)
    {
        $achievement->delete();
        Cache::forget('home_achieve');
        Cache::forget('achieve_lists');
        return redirect()->route('admin.achievements.index')->with('success', 'Achievement deleted successfully');
    }
}
