<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Cache;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->get();
        return view('admin.news.index', compact('news'));
    }

    public function add(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            $news = new News();
            $news->title = $request->title;
            $news->short_content = $request->short_content;
            $news->extra_content = $request->extra_content;
            if ($request->hasFile('feature_image')) {
                $news->feature_image = $request->feature_image->store('uploads/news');
            }
            $news->save();
            Cache::forget('home_news');
            Cache::forget('news_lists' . md5($request->fullUrl()));
            Cache::forget('latest_news_sidebar');

            return redirect()->back()->with('message', 'Successfully Added');
        } else {
            return view('admin.news.add');
        }
    }
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'feature_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    //         'short_content' => 'required|string|max:500',
    //         'extra_content' => 'required',
    //     ]);

    //     // Upload feature image
    //     $path = $request->file('feature_image')->store('uploads/news');

    //     News::create([
    //         'title' => $request->title,
    //         'feature_image' => $path,
    //         'short_content' => $request->short_content,
    //         'extra_content' => $request->extra_content,
    //     ]);

    //     return redirect()->route('admin.news.index')->with('success', 'News added successfully!');
    // }

    public function edit(Request $request, News $news)
    {
        if ($request->getMethod() == 'POST') {
            $news->title = $request->title;
            $news->short_content = $request->short_content;
            $news->extra_content = $request->extra_content;
            if ($request->hasFile('feature_image')) {
                $news->feature_image = $request->feature_image->store('uploads/news');
            }
            $news->save();
            Cache::forget('home_news');
            Cache::forget('news_lists' . md5($request->fullUrl()));
            Cache::forget('latest_news_sidebar');
            return redirect()->back()->with('message', 'Successfully Updated');
        } else {
            return view('admin.news.edit', compact('news'));
        }
    }

    // public function update(Request $request, News $news)
    // {
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'feature_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    //         'short_content' => 'required|string|max:500',
    //         'extra_content' => 'required',
    //     ]);

    //     if ($request->hasFile('feature_image')) {
    //         $path = $request->file('feature_image')->store('uploads/news');
    //         $news->feature_image = $path;
    //     }

    //     $news->update([
    //         'title' => $request->title,
    //         'short_content' => $request->short_content,
    //         'extra_content' => $request->extra_content,
    //     ]);

    //     return redirect()->route('admin.news.index')->with('success', 'News updated successfully!');
    // }

    public function del(News $news)
    {
        $news->delete();
        Cache::forget('home_news');
        Cache::forget('news_lists');
        Cache::forget('latest_news_sidebar');
                        return redirect()->route('admin.news.index')->with('success', 'News deleted successfully!');
    }
}
