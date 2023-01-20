<?php

namespace App\Http\Controllers\Kajian;

use App\Http\Controllers\Controller;
use App\Http\Requests\TopikkajianRequest as Request;
use Illuminate\Http\Request as DefaultRequest;
//use App\Events\UserDeleteEvent;
use DB;
use App\Models\Topikkajian;

class TopikkajianController extends Controller
{
    public function index(Topikkajian $topikkajian)
    {
        $topikkajian = Topikkajian::get();
        return view('kajian.topikkajian.index', compact('topikkajian'));
    }

    public function create()
    {
        $maxId = DB::table('topik_kajians')->max('id');
        $max = $maxId + 1;
        return view('kajian.topikkajian.create', compact('max'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nm_topik_kajian' => 'required|max:255',
        ]);

        Topikkajian::create($validateData);
        
        return redirect()->route('topikkajian.index')->with('success', 'Data Topik Kajian Berhasil disimpan');
    }


    public function edit(Topikkajian $topikkajian)
    {
        return view('kajian.topikkajian.edit', compact('topikkajian'));
    }

    public function update(DefaultRequest $request, Topikkajian $topikkajian)
    {

        $topikkajian->update($request->all());
        return redirect()->route('topikkajian.index')->with('success', 'Data Topik Kajian berhasil diubah');
    }

    public function destroy(Topikkajian $topikkajian)
    {
        // event(new UserDeleteEvent($user));
        $topikkajian->delete();
        return redirect()->route('topikkajian.index')->with('success', 'Data Topik Kajian berhasil dihapus');
    }
}
