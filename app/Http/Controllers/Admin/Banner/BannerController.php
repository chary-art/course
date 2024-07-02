<?php

namespace App\Http\Controllers\Admin\Banner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Banner\StoreRequest;
use App\Http\Requests\Admin\Banner\UpdateRequest;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index() {
        $banners = Banner::all();
        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        $this->authorize('create', Banner::class);
        return view('admin.banners.create');
    }

    public function edit(Banner $banner)
    {
        $this->authorize('update', $banner);
        return view('admin.banners.edit', compact('banner'));
    }

    public function show(Banner $banner)
    {
        $this->authorize('view', $banner);
        return view('admin.banners.show', compact('banner'));
    }

    public function store(StoreRequest $request)
    {
        $this->authorize('create', Banner::class);
        $data = $request->validated();
        if(isset($data['image']))
        {
            $data['image'] = Storage::disk('public')->put('/images/banner', $data['image']);
        }
        Banner::create($data);
        return redirect()->route('admin.banner.index')
            ->with('successful_message', trans('messages.The post has been added successfully!'));
    }

    public function update(UpdateRequest $request, Banner $banner)
    {
        $this->authorize('update', $banner);
        $data = $request->validated();
        if(isset($data['image'])){
            $data['image'] = Storage::disk('public')->put('/images/banner', $data['image']);
        }
        $banner->update($data);
        return redirect()->route('admin.banner.show', compact('banner'))
            ->with('update', trans('messages.The post has been updated successfully!'));
    }

    public function delete(Banner $banner)
    {
        $this->authorize('delete', $banner);
        $banner->delete();
        return redirect()->route('admin.banner.index');

    }
}
