<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Provider;
use App\Http\Controllers\Api\SeamlesWsController;

class GameController extends Controller
{
    public function slot()
    {
        $pageTitle = 'Slot';
        $provider = navbar('slot');
        return view('frontend.games.slot', compact('provider', 'pageTitle'));
    }

    public function casino()
    {
        $pageTitle = 'Casino';
        $provider = navbar('casino');
        return view('frontend.games.slot', compact('provider', 'pageTitle'));
    }

    public function game($slug)
    {
        $provider = Provider::where('slug', $slug)->first();
        $games = DB::table('tb_games')->where('game_provider', $provider->provider_code)->get();
        return view('frontend.games.list', compact('provider', 'games'));
    }

    public function launch_game(Request $request)
    {
        $api = DB::table('api_providers')->first();
        $extplayer = auth()->user()->extplayer;
        $endpoint ="{$api->url}LaunchGame?apikey={$api->apikey}&signature={$api->secretkey}&username={$extplayer}&providerCode={$request->providerCode}&gameCode={$request->gameCode}&gameType={$request->gameType}";

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

        $result = json_decode($response);

        if ($result->ErrorCode == 0) {
            return redirect($result->Url);
        } else {
            return back();
        }
    }
}
