<?php

namespace App\Http\Controllers\Admin\Video;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Video\StoreRequest;
use App\Http\Requests\Admin\Video\UpdateRequest;
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

    public function create()
    {
        $this->authorize('create', Video::class);
        $teachers = Teacher::all();
        $videos = Video::all();
        return view('admin.videos.create', compact('teachers', 'videos'));
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

    public function store(StoreRequest $request)
    {
        $this->authorize('create', Video::class);
        $data = $request->validated();
        if (isset($data['video'])) {
            $data['video'] = Storage::disk('public')->put('/videos', $data['video']);
        }
        Video::create($data);
        return redirect()->route('admin.video.index')
            ->with('successful_message', 'The post has been added successfully!');
    }

    public function update(UpdateRequest $request, Video $video)
    {
        $this->authorize('update', $video);
        $data = $request->validated();
        if (isset($data['video'])) {
            $data['video'] = Storage::disk('public')->put('/videos', $data['video']);
        }
        $video->update($data);
        return redirect()->route('admin.video.show', compact('video'))
            ->with('update', trans('messages.The post has been updated successfully!'));
    }

    public function delete(Video $video)
    {
        $this->authorize('delete', $video);
        $video->delete();
        return redirect()->route('admin.video.index');

    }

    //  public function download(Video $video)
    // {
    //     // $video = Video::firstOrFail();
    //     // $pathToFile = storage_path("" . $video->path);
    //     // return response()->download($pathToFile);


    //     $filename = $video->video_id;
    //     $tempFile = tempnam(sys_get_temp_dir(), $filename);
    //     copy($video->path, $tempFile);
    //     header("Content-Disposition: attachment; filename = ".$filename);
    //     header("X-Accel-Redirect: ".$filename);
    //     return response()->download($tempFile, $filename);
    // }

//    public function download($id)
//    {
//        $media = Media::findOrFail($id);
//
//        if (Illuminate\Support\Facades\File::exists(public_path('audion/' . $media->filename))) {
//            return response()->download(
//                public_path('audion/' . $media->filename),
//                'whatever-the-name-you-want'
//            );
//        }
//    }




}
