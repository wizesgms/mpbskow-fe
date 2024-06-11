<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Saldo;
use App\Models\Bank;
use App\Http\Controllers\Api\SeamlesWsController;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'extplayer' => $data['username'].random_string(5),
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'nama_lengkap' => $data['accName'],
            'no_hp' => $data['phone'],
            'level' => 'user',
            'balance' => 0,
            'refferal' => $data['referral'],
            'status' => 1,
            'status_game' => 0,
        ]);

        $saldo = new Saldo();
        $saldo->id_user = $user->id;
        $saldo->active = 0;
        $saldo->pending = 0;
        $saldo->transfer = 0;
        $saldo->payout = 0;
        $saldo->save();

        $bank = new Bank();
        $bank->nama_bank = $data['bank'];
        $bank->nomor_rekening = $data['accNumber'];
        $bank->nama_pemilik = $data['accName'];
        $bank->id_user = $user->id;
        $bank->level = 'user';
        $bank->save();

        $end = new SeamlesWsController();
        $end->create($user->extplayer);

        return $user;
    }
}
