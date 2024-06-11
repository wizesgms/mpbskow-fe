<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $banner = DB::table('tb_banner')->where('status', 'active')->get();
        $games = DB::table('tb_games')->where('game_provider', 'PRAGMATIC')->limit(9)->get();
        $popup = DB::table('tb_popup')->where('status', 'active')->first();
        $bank = DB::table('tb_bank')->where('level', 'admin')->get();
        return view('frontend.index',compact('banner','popup','games','bank'));
    }

    public function popular()
    {
        $games = DB::table('tb_games')->where('game_type', 'slots')->limit(12)->get();
        return view('frontend.popular',compact('games'));
    }

    public function check(Request $request)
    {
        $user = DB::table('users')->where('username', $request->username)->first();
        if (!$user) {
            return response()->json([
                'error' => 'Nama Pengguna Bisa digunakan.',
                'success' => false
            ],200);
        } elseif (!empty($user)) {
            return response()->json([
                'error' => 'Nama Pengguna Sudah Terdaftar',
                'success' => true
            ],200);
        }
    }

    public function promotion()
    {
        $promotion = DB::table('tb_bonus')->get();
        return view('frontend.promotion.promotion',compact('promotion'));
    }

    public function promotiondetail($slug)
    {
        $promotion = DB::table('tb_bonus')->get();
        $now = DB::table('tb_bonus')->where('slug', $slug)->first();
        return view('frontend.promotion.detail',compact('promotion','now'));
    }
}
