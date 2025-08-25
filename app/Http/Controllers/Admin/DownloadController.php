<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Download;

class DownloadController extends Controller
{
    public function index()
    {
        $downloads = Download::all();
        return view('admin.downloads.index', compact('downloads'));
    }

    public function add(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('admin.downloads.create');
        } else {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'file' => 'required|file|max:2048',
            ]);

            // Check if file is uploaded
            if ($request->hasFile('file')) {
                $filePath = $request->file('file')->store('uploads/downloads');
            }
            $download = new Download();
            $download->title = $request->title;
            $download->description = $request->description;
            $download->file_path = $filePath;
            $download->save();

            return redirect()->route('admin.downloads.add')->with('success', 'Download added successfully!');
        }

    }
    public function edit($id)
    {
        $download = Download::findOrFail($id);
        return view('admin.downloads.edit', compact('download'));
    }
    public function update(Request $request, $id)
    {
        $download = Download::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'nullable|file|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('uploads/downloads');
            $download->file_path = $filePath;
        }

        $download->title = $request->title;
        $download->description = $request->description;
        $download->save();

        return redirect()->route('admin.downloads.edit', $id)->with('success', 'Download updated successfully!');
    }

    public function del($id)
    {
        Download::where('id', $id)->delete();
        return redirect()->route('admin.downloads.index')->with('success', 'Download deleted successfully!');
    }

}
