<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request as DefaultRequest;
use App\Http\Requests\LevelRequest as Request;


use App\Models\Level;
use App\Models\Nasabah;
use DB;

class LevelController extends Controller
{
    public function index()
    {
        $level = Level::get();
        return view('admin.level.index', compact('level'));
    }

    public function create()
    {
        $maxId = DB::table('level')->max('id');
        $max = $maxId + 1;
        return view('admin.level.create', compact('max'));
    }

    public function store(Request $request)
    {

        Level::create($request->all());
        return redirect()->route('admin.level.index')->with('success', 'Data Level berhasil disimpan');
    }

    public function show(Level $level)
    {
        $level = DB::table('level')
            ->where('level.id', $level->id)->first();
        return view('admin.level.show', compact('level'));
    }

    public function edit(Level $level)
    {
        return view('admin.level.edit', compact('level'));
    }

    public function update(DefaultRequest $request, Level $level)
    {
        $level->update($request->all());
        return redirect()->route('admin.level.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy(Level $level)
    {
        $level->delete();
        return redirect()->route('admin.level.index')->with('success', 'Data berhasil dihapus');
    }
}
