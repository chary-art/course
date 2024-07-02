<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        $roles = Role::getRoles();
        return view('admin.users.index', compact('users', 'roles'));
    }

    public function create()
    {
        $this->authorize('create', User::class);
        $roles = Role::getRoles();
        return view('admin.users.create', compact('roles'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);
        $roles = Role::getRoles();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function show(User $user)
    {
        $this->authorize('view', $user);
        $roles = Role::getRoles();
        return view('admin.users.show', compact('user', 'roles'));
    }

    public function store(StoreRequest $request)
    {
        $this->authorize('create', User::class);
        $data = $request->validated();
        if(isset($data['image']))
        {
            $data['image'] = Storage::disk('public')->put('/images/user', $data['image']);
        }
        $data['password'] = Hash::make($data['password']);

        User::create($data);
//        dd($data);
        return redirect()->route('admin.user.index')
            ->with('successful_message', 'The post has been added successfully!');
    }

    public function update(UpdateRequest $request, User $user)
    {
        $this->authorize('update', $user);
        $roles = Role::getRoles();
        $data = $request->validated();
        if(isset($data['image']))
        {
            $data['image'] = Storage::disk('public')->put('/images/user', $data['image']);
        }
//        $data['password'] = Hash::make($data['password']);
        $user->update($data);
        return redirect()->route('admin.user.show', compact('user', 'roles'))
            ->with('update', trans('messages.The post has been updated successfully!'));
    }

    public function delete(User $user)
    {
        $this->authorize('delete', $user);
        $user->delete();
        return redirect()->route('admin.user.index');
    }


}
