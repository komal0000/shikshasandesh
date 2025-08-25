<?php
use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class AboutUsController extends Controller
{
    public function index()
    {
        // Retrieve the About Us data (assuming only one record for About Us)
        $aboutUs = AboutUs::firstOrCreate([]);
        return view('admin.about-us.index', compact('aboutUs'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'photo' => 'nullable|image|max:2048',
            'thumbnail' => 'nullable|image|max:1024',
            'youtube_video_link' => 'nullable|url',
            'description' => 'nullable|string',
        ]);

        // Retrieve the About Us data (only one entry exists)
        $aboutUs = AboutUs::firstOrCreate([]);

        // Handle the file upload for the photo
        if ($request->hasFile('photo')) {
            $aboutUs->photo = $request->file('photo')->store('uploads', 'public');
        }

        // Handle the file upload for the thumbnail
        if ($request->hasFile('thumbnail')) {
            $aboutUs->thumbnail = $request->file('thumbnail')->store('uploads', 'public');
        }

        // Update the other fields
        $aboutUs->youtube_video_link = $request->youtube_video_link;
        $aboutUs->description = $request->description;
        $aboutUs->save();

        return redirect()->route('admin.aboutusindex')->with('success', 'About Us updated successfully');
    }
}
