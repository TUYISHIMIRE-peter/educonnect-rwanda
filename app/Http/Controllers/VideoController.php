<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\User;

class VideoController extends Controller
{

    public function index()
    {
    $videos = Video::all(); 

    return view('uploaded', ['videos' => $videos]);
    }
 // Import the Video model at the top of your controller

public function upload(Request $request)
{
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'video' => 'required|file|mimetypes:video/*',
    ]);

    $video = new Video;

    $videoPath = $request->file('video')->store('videos', 'public');

    $video->title = $request->input('title');
    $video->description = $request->input('description');
    $video->file_path = $videoPath;

    $video->save();

    return redirect('/uploaded')->with('success', 'Video uploaded successfully');
}

}
