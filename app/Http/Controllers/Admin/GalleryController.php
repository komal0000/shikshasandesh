<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cache;
class GalleryController extends Controller
{
    //types
    public function indexType()
    {
        $types = GalleryType::all('id', 'icon', 'name');
        return view('admin.gallery.type', compact('types'));
    }

    public function addType(Request $request)
    {
        $type = new GalleryType();
        $type->name = $request->name;
        $type->icon = $request->icon->store('uploads/gallery/' . Carbon::now()->format('Y/m/d'));
        $type->save();
        Cache::forget('gallery_types');
        return redirect()->back()->with('message', 'Gallery Added Sucessfully');
    }
    public function editType(Request $request, GalleryType $type)
    {
        $type->name = $request->name;
        if ($request->hasFile('icon')) {
            $type->icon = $request->icon->store('uploads/gallery/' . Carbon::now()->format('Y/m/d'));
        }
        $type->save();
        Cache::forget('gallery_types');
        return redirect()->back()->with('message', 'Gallery Updated Sucessfully');
    }

    public function delType(Request $request, GalleryType $type)
    {
        $type->delete();
        Cache::forget('gallery_types');
        return redirect()->back()->with('message', 'Gallery Deleted Sucessfully');
    }

    //manage
    public function index(GalleryType $type)
    {
        return view('admin.gallery.index', compact('type'));
    }

    public function del($gallery_id)
    {
        Gallery::where('id', $gallery_id)->delete();
    }
    public function destroy($id)
    {
        $image = Gallery::find($id);

        if (!$image) {
            return response()->json(['success' => false, 'message' => 'Image not found']);
        }

        $filePath = public_path($image->file);
        $thumbPath = $image->thumb ? public_path($image->thumb) : null;

        if ($image->delete()) {
            if (file_exists($filePath))
                unlink($filePath);
            if ($thumbPath && file_exists($thumbPath))
                unlink($thumbPath);

            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Failed to delete from database']);
        }
    }

    public function add(Request $request)
    {
        $data = [];
        if ($request->has('images')) {
            $path = 'uploads/gallery/' . Carbon::now()->format('Y/m/d');
            $thumbpath = 'uploads/gallery/thumb/' . Carbon::now()->format('Y/m/d');
            foreach ($request->images as $image) {
                $gallery = new Gallery();
                $gallery->file = $image->store($path);
                $gallery->gallery_type_id = $request->type;
                $gallery->save();

                try {
                    //code...
                    $filepath = public_path($gallery->file);
                    $img = Image::make($filepath);
                    $name = $thumbpath . '/' . basename($filepath);
                    $img->resize(250, 250, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                    File::ensureDirectoryExists(public_path($thumbpath));
                    $img->save(public_path($name));
-$gallery->thumb = $name;
                    $gallery->save();
                } catch (\Throwable $th) {

                }
                array_push($data, $gallery);
            }
        }
        return response()->json($data);
    }


}
