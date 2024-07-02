<?php

namespace App\Http\Controllers\Admin\Event;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Event\StoreRequest;
use App\Http\Requests\Admin\Event\UpdateRequest;
use App\Models\Course;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index() {
        $events = Event::all();
        $courses = Course::all();
        return view('admin.events.index', compact('events', 'courses'));
    }

    public function create()
    {
        $this->authorize('create', Event::class);
        $events = Event::all();
        return view('admin.events.create', compact( 'events'));
    }

    public function edit(Event $event)
    {
        $this->authorize('update', $event);
        return view('admin.events.edit', compact( 'event'));
    }

    public function show(Event $event)
    {
        $this->authorize('view', $event);
        return view('admin.events.show', compact('event'));
    }

    public function store(StoreRequest $request)
    {
        $this->authorize('create', Event::class);
        $data = $request->validated();
        if(isset($data['image']))
        {
            $data['image'] = Storage::disk('public')->put('images/event', $data['image']);
        }
//        dd($data);
        Event::create($data);
        return redirect()->route('admin.event.index')->with('successful_message', 'The post has been added successfully!');
    }

    public function update(UpdateRequest $request, Event $event)
    {
        $this->authorize('update', $event);
        $data = $request->validated();
        if(isset($data['image']))
        {
            $data['image'] = Storage::disk('public')->put('/images/event', $data['image']);
        }
        $event->update($data);
        return redirect()->route('admin.event.show', compact('event'))
            ->with('update', trans('messages.The post has been updated successfully!'));

    }

    public function delete(Event $event)
    {
        $this->authorize('delete', $event);
        $event->delete();
        return redirect()->route('admin.event.index');

    }
}
