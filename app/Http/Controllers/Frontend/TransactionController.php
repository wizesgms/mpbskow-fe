<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Api\SeamlesWsController;
use PhpParser\Node\Expr\New_;

class TransactionController extends Controller
{
    public function transaction()
    {
        $bank = DB::table('tb_bank')->where('level', 'admin')->get();
        $bu = DB::table('tb_bank')->where('id_user', auth()->user()->id)->first();
        $bonus = DB::table('tb_bonus')->where('status', 'active')->where('type', 2)->get();

        $hdepo = DB::table('tb_transaksi')->where('id_user', auth()->user()->id)->where('transaksi', 'Top Up')->orderBy('id', 'desc')->limit(7)->get();
        $hwd = DB::table('tb_transaksi')->where('id_user', auth()->user()->id)->where('transaksi', 'Withdraw')->orderBy('id', 'desc')->limit(7)->get();

        return view('frontend.transaction.transaction', compact('bank', 'bu', 'bonus', 'hdepo', 'hwd'));
    }

    public function posttrx(Request $request)
    {
        $check = DB::table('tb_transaksi')->where('id_user', auth()->user()->id)->where('transaksi', 'Top Up')->where('status', 'Pending')->first();
        if (!empty($check)) {
            return redirect()->back()->with('error', 'Anda memiliki transaksi pending sebelumnya, harap di selesaikan telebih dahulu.');
        } elseif ($request->nominal < general()->min_depo) {
            return redirect()->back()->with('error', 'Minimal deposit sebesar : Rp. ' . number_format(general()->min_depo, 2));
        } else {
            $metode = DB::table('tb_bank')->where('id', $request->metode)->first();
            $trans = new Transaction();

            if ($request->hasFile('gambar')) {

                $path = 'ImageFile';
                $contents = fopen($request->file('gambar'), 'r');
                $response = Http::attach('file', $contents, $request->file('gambar')->getClientOriginalName())->post('https://cdn.wizestatic.cloud/api_upload', [
                    'accesskey' => 'WZG00DURSDRSKNYVNFSF',
                    'secretkey' => '7qOoZCSrLNyeTJYc3o2VeaxVzMVR',
                    'path' => $path
                ]);

                $trans->gambar = $response['Images'];
            }
            $bonus = DB::table('tb_bonus')->where('id', $request->bonus)->first();
            $trans->trx_id = getTrx();
            $trans->transaksi = 'Top Up';
            $trans->total = $request->nominal;
            $trans->dari_bank = $request->dari_bank;
            $trans->metode = $metode->nama_bank;
            $trans->bonus = $request->bonus;
            if ($request->bonus == 'tanpabonus') {
                $trans->bonus_amount = 0;
            } elseif ($request->bonus != 'tanpabonus') {
                $trans->bonus_amount = $bonus->bonus;
            }
            $trans->keterangan = $request->keterangan;
            $trans->status = 'Pending';
            $trans->id_user = auth()->user()->id;
            $trans->username = auth()->user()->username;
            $trans->save();

            $user = User::find(auth()->user()->id);
            $user->deposit = 1;
            $user->save();

            return redirect()->back()->with('success', 'Permintaan deposit anda telah berhasil dikirim.');
        }
    }

    public function withdraw(Request $request)
    {
        $check = DB::table('tb_transaksi')->where('id_user', auth()->user()->id)->where('transaksi', 'Withdraw')->where('status', 'Pending')->first();
        if (!empty($check)) {
            return redirect()->back()->with('error', 'Anda memiliki transaksi pending sebelumnya, harap di selesaikan telebih dahulu.');
        } elseif ($request->jumlah < general()->min_wd) {
            return redirect()->back()->with('error', 'Minimal withdraw sebesar : Rp. ' . number_format(general()->min_wd, 2));
        } elseif ($request->jumlah > auth()->user()->balance) {
            return redirect()->back()->with('error', 'Saldo Anda Tidak Mencukupi.');
        } else {
            $trans = new Transaction();
            $trans->trx_id = getTrx();
            $trans->transaksi = 'Withdraw';
            $trans->total = $request->jumlah;
            $trans->dari_bank = $request->bank;
            $trans->keterangan = $request->keterangan;
            $trans->status = 'Pending';
            $trans->id_user = auth()->user()->id;
            $trans->username = auth()->user()->username;
            $trans->save();

            $end = new SeamlesWsController();
            $end->withdraw(auth()->user()->extplayer, $request->jumlah);

            return redirect()->back()->with('success', 'Permintaan withdraw anda telah berhasil dikirim.');
        }
    }
}
