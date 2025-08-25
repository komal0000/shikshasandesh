<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    /*
    *0 for image
    *1 for text
    */
    const Setting = [
        'top' => [
            "Header Setting", [
                ['phone', 1],
                ['logo', 0],
                ['fabicon', 0],
            ]
        ],

        'feature' => [
            "Feature Section",
            [
                ["logo1", 1],
                ["text1", 1],
                ["desc1", 2],
            ],
            'views/front/home/feature.blade.php'

        ],
        'about' => [
            "About Section",
            [
                ["img", 0],
                ["txt1", 1],
                ["des1", 2],
                ["des2", 2],
            ],
            'views/front/home/about.blade.php'
        ],
        'contact' => [
            "Contact Section",[
                ["text1",1],
                ["des1",2],
                ["text2",1],
                ["des2",2],
                ["text3",1],
                ["des3",2],
            ],
            'views/front/home/contact.blade.php'
        ],
        'homeabout' => [
            "Home About", [
                ['desc', 2],
                ['img1', 0],
                ['img2', 0],
                ['img3', 0],
                ['title1', 1],
                ['title2', 1],
                ['desc1', 2],
                ['desc2', 2],
            ],
            'views/front/home/homeabout.blade.php'
        ],
        // 'feature' => [
        //     "Home Features", [
        //         ['count1', 1],
        //         ['subtitle1', 1],
        //         ['count2', 1],
        //         ['subtitle2', 1],
        //         ['count3', 1],
        //         ['subtitle3', 1],
        //         ['count4', 1],
        //         ['subtitle4', 1],

        //         ['reason1', 1],
        //         ['reason2', 1],
        //         ['reason3', 1],
        //         ['desc', 2],

        //     ],
        //     'views/front/home/feature.blade.php'
        // ],
        'social' => [
            "Social Links", [
                ['Facebook', 1],
                ['Twitter', 1],
                ['Instagram', 1],
                ['Youtube', 1],

            ]
        ],
        'copy' => [
            "CopyRight", [
                ['copyright', 1],
            ]
        ]
    ];



    public function index($type, Request $request)
    {
        $data = self::Setting[$type];
        $curdata = [];
        foreach ($data[1] as $key => $attr) {
            $k = $type . '_' . $attr[0];
            $curdata[$attr[0]] = getSetting($k,true);
        }
        if ($request->getMethod() == "POST") {
            foreach ($data[1] as $key => $attr) {
                $k = $type . '_' . $attr[0];
                try {
                    if ($attr[1] == 0) {
                        if($request->hasFile($k)){
                            $s = setSetting($k, $request->file($k)->store('uploads/settings'), true);
                        }
                    } else {
                        $s = setSetting($k, $request->input($k), true);
                    }
                    $curdata[$attr[0]] = $s->value;
                } catch (\Throwable $th) {
                }
            }

            if (isset($data[2])) {
                file_put_contents(resource_path($data[2]), view('admin.setting.template.' . $type, compact('curdata'))->render());
            } else {
                file_put_contents(resource_path('views/front/layout/' . $type . '.blade.php'), view('admin.setting.template.' . $type, compact('curdata'))->render());
            }
            return redirect()->back();
        } else {
            return view('admin.setting.index', compact('data', 'type'));
        }
    }

    public function meta(Request $request)
    {
        if ($request->getMethod() == "GET") {
            $data = getSetting('meta') ?? ((object)([
                'desc' => '',
                'image' => '',
                'keyword' => '',
            ]));
            // dd($data);

            return view('admin.setting.meta', compact('data'));
        } else {
            $olddata = getSetting('meta') ?? ((object)([
                'desc' => '',
                'image' => '',
                'keyword' => '',
            ]));
            $data = [
                'desc' => $request->desc,
                'keyword' => $request->keyword,
                'image' => $request->hasFile('image') ? $request->image->store('uploads/settings') : $olddata->image
            ];
            setSetting('meta', $data);
            file_put_contents(resource_path('views/front/layout/meta.blade.php'), view('admin.setting.template.meta')->render());

            return redirect()->back()->with('message', "Setting Saved Sucessfully");
        }
    }

    public function homepage(Request $request)
    {
        if ($request->getMethod() == "GET") {
            $data = getSetting('homepage') ?? ((object)([
                'program' => '',
                'why' => '',
                'event' => '',
                'news' => '',
                'about' => [],
                'about_title' => [],

            ]));
            // dd($data);
            $abouts = DB::table('pages')->where('type', 'about')->orWhere('type', 'msg')->select('id', 'title')->get();
            return view('admin.setting.homepage', compact('data', 'abouts'));
        } else {
            $about = [];
            if ($request->filled('about')) {
                foreach ($request->about as $key => $abt) {
                    $about['about_' . $abt] = [
                        'id' => $abt,
                        'title' => $request->filled('about_' . $abt) ? $request->input('about_' . $abt) : 'About Us'
                    ];
                }
            }
            $data = [
                'program' => $request->program,
                'why' => $request->why,
                'event' => $request->event,
                'news' => $request->news,
                'about' => $request->about ?? [],
                'about_title' => $about,
            ];
            setSetting('homepage', $data);
            return redirect()->back()->with('message', "Setting Saved Sucessfully");
        }
    }


    public function contact(Request $request)
    {
        if ($request->getMethod() == "GET") {
            $data = getSetting('contact') ?? ((object)([
                'map' => '',
                'email' => '',
                'phone' => '',
                'addr' => '',
                'others' => [],

            ]));
            // dd($data);


            return view('admin.setting.contact', compact('data'));
        } else {
            $others = [];
            if ($request->filled('others')) {
                foreach ($request->others as $key => $other) {
                    array_push($others, [
                        'name' => $request->input('name_' . $other) ?? '',
                        'phone' => $request->input('phone_' . $other) ?? '',
                        'designation' => $request->input('designation_' . $other) ?? '',
                        'email' => $request->input('email_' . $other) ?? '',
                    ]);
                }
            }
            $data = [
                'map' => $request->map ?? '',
                'email' => $request->email ?? '',
                'phone' => $request->phone ?? '',
                'addr' => $request->addr ?? '',
                'others' => $others
            ];
            setSetting('contact', $data);
            // dd($data

            file_put_contents(resource_path('views/front/layout/footercontact.blade.php'), view('admin.setting.template.footercontact', compact('data'))->render());

            return redirect()->back()->with('message', "Setting Saved Sucessfully");
        }
    }
}
