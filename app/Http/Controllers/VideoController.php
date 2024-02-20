<?php

namespace App\Http\Controllers;namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class VideoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'video' => 'required|file|mimes:mp4,avi,mov,webm|max:102400', // 100MB Max
        ]);

        if ($request->hasFile('video')) {
            $path = $request->file('video')->store('videos', 'public');
            $video = Video::create([
                'name' => $request->file('video')->getClientOriginalName(),
                'path' => $path,
            ]);

            return redirect()->back()->with('success', 'Video uploaded successfully!');
        }

        return redirect()->back()->with('error', 'Please select a valid video file.');
    }

    public function dashboard()
    {
        $videos = Video::latest()->take(15)->get();
        return Inertia::render('Dashboard', ['videos' => $videos]);
    }
}

