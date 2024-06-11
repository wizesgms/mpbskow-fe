<?php

use App\Lib\ClientInfo;
use App\Models\Provider;
use Illuminate\Support\Facades\DB;

function general()
{
    $general = DB::table('tb_web')->find(1);
    return $general;
}

function navbar($type)
{
    $provider = Provider::where('type',$type)->get();
    return $provider;
}

function floating()
{
    $floating = DB::table('floatings')->get();
    return $floating;
}

function generateRandomRTP()
{
    $minRTP = 80;
    $maxRTP = 96;

    // Menghasilkan nilai acak antara 80 dan 96
    $randomRTP = rand($minRTP, $maxRTP);

    return $randomRTP;
}

function random_string($length) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function contact()
{
    $general = DB::table('tb_contact')->find(1);
    return $general;
}

function getTrx($length = 12)
{
    $characters = 'ABCDEFGHJKMNOPQRSTUVWXYZ123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


function getDay()
{
    $days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    $dayIndex = date('w');
    return $days[$dayIndex];
}

// Fungsi untuk menghasilkan nomor lotto secara acak
function generateLottoNumber()
{
    return rand(1000, 9999);
}
