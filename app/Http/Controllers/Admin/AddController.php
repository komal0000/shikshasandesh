<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Add;

class AddController extends Controller
{
    public function index()
    {
        $adds = Add::whereIn('key', ['students', 'graduates', 'awards', 'faculties'])->get()->keyBy('key');
        return view('admin.add.index', compact('adds'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'students' => 'required|string|max:255',
            'graduates' => 'required|string|max:255',
            'awards' => 'required|string|max:255',
            'faculties' => 'required|string|max:255',
            'students_icon' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'graduates_icon' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'awards_icon' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'faculties_icon' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $keys = ['students', 'graduates', 'awards', 'faculties'];

        foreach ($keys as $key) {
            $add = Add::updateOrCreate(['key' => $key], ['value' => $request->$key]);

            if ($request->hasFile("{$key}_icon")) {
                $file = $request->file("{$key}_icon");
                $fileName = time() . '_' . $file->getClientOriginalName();
                $destinationPath = public_path('uploads');

                // Ensure the directory exists
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0775, true);
                }

                // Move file to public/uploads/
                $file->move($destinationPath, $fileName);

                // Store path in database
                $add->update(['icon' => 'uploads/' . $fileName]);
            }
        }

        return redirect()->back()->with('success', 'Data updated successfully!');
    }
}
