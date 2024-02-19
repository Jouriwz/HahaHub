<?php

namespace App\Http\Controllers;namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'video' => 'required|file|mimes:mp4,avi,mov,webm|max:102400', // 100MB Max
        ]);

        if ($request->hasFile('video')) {
            // Store the video file
            $path = $request->file('video')->store('videos', 'public');


            // Save video information in the database
            $video = new Video;
            $video->name = $request->file('video')->getClientOriginalName();
            $video->path = $path;
            $video->save();

            return back()->with('success', 'Video uploaded successfully!');
        }

        return back()->with('error', 'Please select a valid video file.');
    }
    public function show(Video $video)
    {
        // Generate a URL to the video storage location
        $videoUrl = Storage::url($video->path);

        // Return a view and pass the video URL to it
        return view('video', compact('videoUrl'));
    }
}

