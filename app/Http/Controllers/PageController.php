<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function index()
    {
        return view('video-upload');
    }

    public function uploadpage()
    {
        return view('video-upload');
    }

    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Ashkhabad');
//        timezone in php.in  is  date.timezone=Asia/Ashkhabad
        $data = new Video();
        $file = $request->video;
        if(isset($file)){
            $filename = date('h-i-s'). '.' . $file->getClientOriginalExtension();
            $request->video->move('storage/docs', $filename);
            $data->video = $filename;
            $data->title_tk = $request->title_tk;
            $data->title_ru = $request->title_ru;
            $data->title_en = $request->title_en;
            $data->save();
        }else{
            return 'dont have video';
        }
//        return redirect()->back();
        return back()->with('success', trans('messages.The post has been added successfully!'));
    }

    public function show()
    {
        $data = Video::all();
        return view('test.showProduct', compact('data'));
    }

    public function download(Request $request, $video)
    {
        return response()->download(public_path('storage/docs/'.$video));
    }
}
