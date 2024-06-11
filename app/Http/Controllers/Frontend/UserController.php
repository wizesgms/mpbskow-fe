<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserController extends Controller
{
    public function profile()
    {
        $bank = DB::table('tb_bank')->where('id_user', auth()->user()->id)->first();
        return view('frontend.profile',compact('bank'));
    }

    public function update(Request $request)
    {
        if(Hash::check($request->password_lama,auth()->user()->password)) {
            $user = User::find(auth()->user()->id);
            $user->password = Hash::make($request->password_baru);
            $user->save();
            return back()->with(['success' => 'Password Telah Berhasil Di Update.']);
        } else {
            return back()->with(['error' => 'Password Salah.']);
        }
    }
}
