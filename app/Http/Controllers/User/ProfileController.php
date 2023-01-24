<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\User;
use Auth;

class ProfileController extends Controller
{
    public function index()
    {
    	return view('user.profile');
    }

    public function update(Request $request)
    {
    	//User::where('id_users',Auth::user()->id_users)->update($request->except(['_token','_method']));
        $validateData = $request->validate([
            
            'email' => 'required',
           // 'photo' => 'image|file|max:1024',
        ]);

        if($request->file('photo')){
            if($request->oldPhoto){
                Storage::delete($request->oldPhoto);
            }
            $validateData['photo'] =  $request->file('photo')->store('img-user');
        }

        User::where('id_users', Auth::user()->id_users)
            ->update($validateData);

    	return redirect()->route('user.profile.index')->with('success','Profil berhasil diperbaharui');
    }
}
