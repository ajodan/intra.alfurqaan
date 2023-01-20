<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\PengurusDeleteEvent;

use App\Models\Pengurus;
use App\Models\User;
use App\Models\Jabatan;
use App\Models\Rekening;
use Str;
use DB;

class PengurusController extends Controller
{
    public function index()
    {
        //$pengurus = Pengurus::get();
        $pr = Pengurus::join('jabatan', 'pengurus.id_jabatan', '=', 'jabatan.id')
            ->select('pengurus.*', 'jabatan.nm_jabatan')->get();
        return view('admin.pengurus.index', ['pengurus' => $pr]);
    }

    public function create()
    {
        $jabatans = Jabatan::pluck('nm_jabatan', 'id');
        return view('admin.pengurus.create', compact('jabatans'));
       // return view('admin.pengurus.create', ['jabatan' => $jab]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'unique:users',
            'email' => 'unique:users',
        ]);

        // User::create([
        //     'username' => Str::lower($request->username),
        //     'name' => $request->nm_pengurus,
        //     'email' => $request->email,
        //     'password' => bcrypt('password'),
        //     'level' => 'pengurus',
        //     'is_active' => '1',
        // ]);

        // $last_id_user = User::latest('id_users')->first()->id_users;


        // $request->request->add([
        //     'id_users' => $last_id_user,
        //     'kd_pengurus' => 'DKM' . Str::upper(Str::random(4)),
        // ]);
        // Pengurus::create($request->all());

        DB::transaction(function () use ($request) {
            User::create([
                'username' => Str::lower($request->username),
                'name' => $request->nm_pengurus,
                'password' => bcrypt('password'),
                'email' => $request->email,
                'level' => 'pengurus',
                'is_active' => '1',
            ]);

            $user = User::latest('id_users')->first();

            $request->request->add([
                'kd_pengurus' => 'DKM' . Str::upper(Str::random(4)),
                'id_users' => $user->id_users,
            ]);

            Pengurus::create($request->all());

            $pengurus = Pengurus::latest('id')->first();

            Rekening::create([
                'no_rekening' => random_int(10000000, 99999999),
                'pin' => '123456',
                'saldo' => 0,
                'kd_pengurus' => $pengurus->kd_pengurus,
            ]);
        });
        return redirect()->route('admin.pengurus.index')->with('success', 'Data Pengurus Berhasil disimpan');
    }

    public function show(Pengurus $pengurus)
    {
        return view('admin.pengurus.show', compact('pengurus'));
    }

    public function edit(Pengurus $pengurus)
    {
        return view('admin.pengurus.edit', compact('pengurus'));
    }

    public function update(Request $request, Pengurus $pengurus)
    {
        $pengurus->update($request->all());
        return redirect()->route('admin.pengurus.index')->with('success', 'Data Pengurus berhasil disimpan');
    }

    public function destroy(Pengurus $pengurus)
    {
        $pengurus->delete();
        return redirect()->route('admin.pengurus.index')->with('success', 'Data Pengurus berhasil dihapus');
    }
}
