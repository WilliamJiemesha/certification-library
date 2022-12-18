<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDO;

class AuthenticateController extends Controller
{
    public function getLogin(Request $request)
    {
        if ($request->session()->has('username')) {
            return redirect('/');
        }
        return view('login');
    }

    public function postLogin(Request $request)
    {

        $username = $request->input('username');
        $password = $request->input('password');

        $userDB = DB::table('peminjam')->select('id_peminjam', 'username', 'password')->where([['username', '=', strtolower($username)], ['password', '=', $password]]);
        if ($userDB->count() == 0) {
            return redirect('/login')->withErrors(['invalidLogin' => 'Email atau Kata Sandi salah']);
        }
        $id = $userDB->first()->id_peminjam;
        $request->session()->put('username', $username);
        $request->session()->put('user_id', $id);
        return redirect('/');
    }

    public function getRegister(Request $request)
    {
        if ($request->session()->has('username')) {
            return redirect('/');
        }
        return view('register');
    }

    public function postRegister(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $userDB = DB::table('peminjam')->select('username', 'password')->where([['username', '=', strtolower($username)], ['password', '=', $password]])->count();
        if ($userDB != 0) {
            return redirect('/register')->withErrors(['invalidRegister' => 'Email atau Kata Sandi sudah digunakan']);
        }

        DB::table('peminjam')->insert([
            ['username' => $username, 'password' => $password]
        ]);
        $userDB = DB::table('peminjam')->select('id_peminjam', 'username', 'password')->where([['username', '=', strtolower($username)], ['password', '=', $password]]);
        if ($userDB->count() != 0) {
            $id = $userDB->first()->id_peminjam;
            $request->session()->put('username', $username);
            $request->session()->put('user_id', $id);
        }
        return redirect('/');
    }
}
