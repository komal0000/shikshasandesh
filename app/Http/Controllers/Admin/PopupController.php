<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Popup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PopupController extends Controller
{
    public function index()
    {

        $popups = DB::table('popups')->get();
        return view('admin.setting.popup.index', compact('popups'));
    }

    public function add(Request $request)
    {

        if ($request->getMethod() == "POST") {

            // dd($request->all());
            $popup = new Popup();

            $popup->image = $request->image->store('uploads/popups');
            if ($request->hasFile('mobile_image')) {
                $popup->mobile_image = $request->mobile_image->store('uploads/popups');
            } else {
                $popup->mobile_image = $popup->image;
            }
            $popup->btn_title = $request->btn_title;
            $popup->btn_link = $request->btn_link;

            $popup->save();
            return redirect()->back()->with('message', 'Popup Added');
            // dd($request->all(),$slider);
        } else {

            return view('admin.setting.popup.add');

        }
    }

    public function del(Request $request, Popup $popup)
    {
        $popup->delete();

        return redirect()->back()->with('message', 'Popup Deleted');

    }
    public function edit(Request $request, Popup $popup)
    {
        if ($request->getMethod() == "POST") {
            $popup->image = $request->image->store('uploads/popups');
            if ($request->hasFile('mobile_image')) {
                $popup->mobile_image = $request->mobile_image->store('uploads/popups');
            }
            $popup->btn_title = $request->btn_title;
            $popup->btn_link = $request->btn_link;
            $popup->save();
            return redirect()->back()->with('message', 'Popup Updated');
            // dd($request->all(),$slider);
        } else {

            return view('admin.setting.popup.edit', compact('popup'));

        }
    }

    public function status(Popup $popup, $status)
    {
        $popup->active = $status;
        $popup->save();
        return redirect()->back()->with('message', 'Popup ' . ($status == 1 ? 'Activated' : 'Deactivated'));
    }
}
