<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\JamaahDeleteEvent;

use App\Models\Jamaah;
use App\Models\Rekening;
use App\Models\User;
use Str;
use DB;

class JamaahController extends Controller
{
    public function index()
    {
        $jamaah = Jamaah::get();
        return view('admin.jamaah.index', compact('jamaah'));
    }

    public function create()
    {
        return view('admin.jamaah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'unique:users',
            'email' => 'unique:users',
        ]);

        DB::transaction(function () use ($request) {
            User::create([
                'username' => Str::lower($request->username),
                'name' => $request->nm_jamaah,
                'password' => bcrypt('password'),
                'email' => $request->email,
                'level' => 'jamaah',
                'is_active' => '1',
            ]);

            $user = User::latest('id_users')->first();

            $request->request->add([
                'kd_jamaah' => 'JMH' . Str::upper(Str::random(4)),
                'id_users' => $user->id_users,
            ]);

            Jamaah::create($request->all());

            $jamaah = Jamaah::latest('id')->first();

            Rekening::create([
                'no_rekening' => random_int(10000000, 99999999),
                'pin' => '123456',
                'saldo' => 0,
                'kd_jamaah' => $jamaah->kd_jamaah,
            ]);
        });

        return redirect()->route('admin.jamaah.index')->with('success', 'Data Jamaah berhasil disimpan');
    }

    public function show(Jamaah $jamaah)
    {
        return view('admin.jamaah.show', compact('jamaah'));
    }

    public function edit(Jamaah $jamaah)
    {
        return view('admin.jamaah.edit', compact('jamaah'));
    }

    public function update(Request $request, Jamaah $jamaah)
    {
        $jamaah->update($request->all());
        return redirect()->route('admin.jamaah.index')->with('success', 'Data Jamaah berhasil diperbaharui');
    }

    public function destroy(Jamaah $jamaah)
    {
        event(new JamaahDeleteEvent($jamaah));
        $jamaah->delete();
        return redirect()->route('admin.jamaah.index')->with('success', 'Data Jamaah berhasil dihapus');
    }
}
