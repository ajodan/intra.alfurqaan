<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest as Request;
use Illuminate\Http\Request as DefaultRequest;
use App\Events\UserDeleteEvent;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{
    public function index(User $user)
    {
        $users = User::get();
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        $level = DB::table('level')->get();
        return view('admin.user.create', compact('level'));
    }

    public function store(Request $request)
    {
        $request->request->add(['password' => bcrypt($request->password)]);
        User::create($request->all());
        return redirect()->route('admin.user.index')->with('success', 'Data Pengguna Berhasil ditambah');
    }

    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }

    public function edit(User $user)
    {
        $level = DB::table('level')->get();
        return view('admin.user.edit', compact('user','level'));
    }

    public function update(DefaultRequest $request, User $user)
    {
        $password = $request->password ? bcrypt($request->password) : $request->old_password;
        $request->request->add(['password' => $password]);
        $user->update($request->all());
        return redirect()->route('admin.user.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy(User $user)
    {
        event(new UserDeleteEvent($user));
        $user->delete();
        return redirect()->route('admin.user.index')->with('success', 'Data berhasil dihapus');
    }
}
