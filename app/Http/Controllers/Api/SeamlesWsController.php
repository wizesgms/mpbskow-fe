<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class SeamlesWsController extends Controller
{
    public function create($extplayer)
    {
        $api = DB::table('api_providers')->first();
        $endpoint ="{$api->url}Create?apikey={$api->apikey}&signature={$api->secretkey}&username={$extplayer}";
        return $this->curl_postc($endpoint);
    }

    public function getBalance($extplayer)
    {
        $api = DB::table('api_providers')->first();
        $endpoint ="{$api->url}GetBalance?apikey={$api->apikey}&signature={$api->secretkey}&username={$extplayer}";
        $response = $this->curl_postc($endpoint);
        $result = json_decode($response);

        $user = User::where('extplayer',$extplayer)->first();
        $user->balance = $result->Balance;
        $user->save();

        return $this->curl_postc($endpoint);
    }

    public function getBalance2()
    {
        $extplayer = auth()->user()->extplayer;
        $api = DB::table('api_providers')->first();
        $endpoint ="{$api->url}GetBalance?apikey={$api->apikey}&signature={$api->secretkey}&username={$extplayer}";
        $response = $this->curl_postc($endpoint);
        $result = json_decode($response);

        $user = User::where('extplayer',$extplayer)->first();
        $user->balance = $result->Balance;
        $user->save();

        return $this->curl_postc($endpoint);
    }

    public function deposit($extplayer,$amount)
    {
        $api = DB::table('api_providers')->first();
        $endpoint ="{$api->url}Transfer?apikey={$api->apikey}&signature={$api->secretkey}&username={$extplayer}&amount={$amount}";
        return $this->curl_postc($endpoint);
    }

    public function withdraw($extplayer,$amount)
    {
        $api = DB::table('api_providers')->first();
        $endpoint ="{$api->url}Withdraw?apikey={$api->apikey}&signature={$api->secretkey}&username={$extplayer}&amount={$amount}";
        return $this->curl_postc($endpoint);
    }

    function curl_postc($endpoint)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
}
