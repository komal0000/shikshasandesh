<?php
namespace App\Http\Controllers;

use Cache;
use Illuminate\Http\Request;
use App\Models\Achievement;
use Illuminate\Support\Facades\DB;

class AchievementviewController extends Controller
{
    public function index()
    {
        $achievements = Cache::rememberForever("achieve_lists", function () {
            return DB ::table("achievements")->get();
        });

        return view('front.newPage.achievement', compact('achievements'));
    }
}
