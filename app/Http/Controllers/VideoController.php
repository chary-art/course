<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::all();
        return view('admin.videos.index', compact('videos'));
    }

    public function edit(Video $video)
    {
        $this->authorize('update', $video);
        $teachers = Teacher::all();
        return view('admin.videos.edit', compact('video', 'teachers'));
    }

    public function show(Video $video)
    {
        $this->authorize('view', $video);
        return view('admin.videos.show', compact('video'));
    }

    public function create()
    {
        $videos = Video::all();
        $teachers = Teacher::all();
        return view('admin.videos.create', compact('videos', 'teachers'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'video' => 'required|file|mimetypes:video/mp4',
            'teacher_id' => 'required|integer|exists:teachers,id'
        ]);
//        dd($request);

        $fileName = $request->video->getClientOriginalName();
        $filePath = 'videos/' . $fileName;

        $isFileUploaded = Storage::disk('public')->put($filePath, file_get_contents($request->video));

        // File URL to access the video in frontend
        $url = Storage::disk('public')->url($filePath);

        if ($isFileUploaded) {
            $video = new Video();
            $video->title = $request->title;
            $video->video = $filePath;
            $video->teacher_id = $request->teacher_id;
            $video->save();
            return back()
                ->with('success', 'Video has been successfully uploaded.');
        }
        return back()
            ->with('error', 'Unexpected error occured');
    }

    public function update(Request $request, Video $video)
    {
        if($request->hasFile('logoImage')){
            $logoImage = $request->file('logoImage');
            $name = $logoImage->getClientOriginalName();
        }



        $this->validate($request, [
            'title' => 'nullable|string|max:255',
            'video' => 'nullable|file|mimetypes:video/mp4',
            'teacher_id' => 'nullable|integer|exists:teachers,id'
        ]);
        $fileName = $request->video->getClientOriginalName();
        $filePath = 'videos/' . $fileName;

        $isFileUploaded = Storage::disk('public')->put($filePath, file_get_contents($request->video));

        // File URL to access the video in frontend
        $url = Storage::disk('public')->url($filePath);
        if ($isFileUploaded) {
//            $video = new Video();
            $video->title = $request->title;
            $video->video = $filePath;
            $video->teacher_id = $request->teacher_id;
            $video->update();
            return back()
                ->with('success', 'Video has been successfully uploaded.');
        }

        return back()
            ->with('error', 'Unexpected error occured');
//        return view('admin.videos.show', compact('video'));


//        $this->authorize('update', $video);
//        $data = $request->validated();
//        if(isset($data['video'])){
//            $data['video'] = Storage::disk('public')->put('/videos/', $data['video']);
//        }
//        $video->update($data);
//        return view('admin.videos.show', compact('video'));
    }

    // public function delete(Video $video)
    // {
    //     $this->authorize('delete', $video);
    //     $video->delete();
    //     return redirect()->route('admin.video.index');

    // }

    // public function download()
    // {
    //     $video = Video::firstOrFail();
    //     $pathToFile = storage_path("" . $video->path);
    //     return response()->download($pathToFile);
    // }
}
