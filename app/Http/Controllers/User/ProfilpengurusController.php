<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Auth;

class ProfilpengurusController extends Controller
{
    public function index()
    {
    	return view('user.profilpengurus');
    }

    public function update(Request $request)
    {
    	User::where('id_users',Auth::user()->id_users)->update($request->except(['_token','_method']));
    	return redirect()->route('user.profilpengurus.index')->with('success','Profil Berhasil diperbaharui');
    }
}
