<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Video;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $videos = Video::latest()->take(15)->get();
        $tags = Tag::all();

        return Inertia::render('Dashboard', [
            'videos' => $videos,
            'allTags' => $tags
        ]);
    }
}
