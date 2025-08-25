<?php

namespace App\Http\Controllers\Admin;
use App\Models\Notice;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class NoticeController extends Controller
{
    // Show all notices
    public function index()
    {
        $notices = Notice::all(); // Get all notices
        return view('admin.notice.index', compact('notices'));
    }

    // Show the form to create a new notice
    public function create()
    {
        return view('admin.notice.add');
    }

    // Store a new notice in the database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'details' => 'required|string',
            'link' => 'nullable|mimes:pdf,docx|max:2048', // Max file size 2MB
        ]);

        // Handle Image Upload (store in 'link' column)
        $imagePath = null;
        if ($request->hasFile('file')) {
            $imagePath = $request->file('file')->store('uploads/notices');
        }

        Notice::create([
            'title' => $request->title,
            'date' => $request->date,
            'details' => $request->details,
            'link' => $imagePath, // Storing image path in 'link' column
        ]);
        Cache::forget('all_notices');
        Cache::forget('noticepage');

        return redirect()->route('admin.notice.index')->with('message', 'Notice added successfully!');
    }
    public function edit($id)
    {
        $notice = Notice::findOrFail($id);
        return view('admin.notice.update', compact('notice'));
    }

    // Update the notice in the database
    public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'date' => 'required|date',
        'details' => 'required|string',
        'file' => 'nullable|mimes:pdf,docx|max:2048',
    ]);

    $notice = Notice::findOrFail($id);

    if ($request->hasFile('file')) {
        // Delete old file if exists
        if ($notice->link && file_exists(storage_path("app/{$notice->link}"))) {
            unlink(storage_path("app/{$notice->link}"));
        }

        // Upload new file
        $notice->link = $request->file('file')->store('uploads/notices');
    }

    // Update other fields
    $notice->update([
        'title' => $request->title,
        'date' => $request->date,
        'details' => $request->details,
        'file' => $notice->link, // Keep the new/old file link
    ]);
    Cache::forget('all_notices');
    Cache::forget('noticepage');

    return redirect()->route('admin.notice.index')->with('success', 'Notice updated successfully.');
}
    // Delete a notice from the database
    public function destroy($id)
    {
        $notice = Notice::findOrFail($id);

        // Delete file if exists
        if ($notice->link && file_exists(storage_path("app/{$notice->link}"))) {
            unlink(storage_path("app/{$notice->link}"));
        }

        $notice->delete();
        Cache::forget('all_notices');
        Cache::forget('noticepage');

        return redirect()->route('admin.notice.index')->with('success', 'Notice deleted successfully.');
    }
}
