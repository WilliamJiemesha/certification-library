<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDO;

class AuthenticateController extends Controller
{

    // Get login view
    public function getLogin(Request $request)
    {
        // Check if user has already logged in
        if ($request->session()->has('username')) {
            // Redirect back
            return redirect('/');
        }

        //Show login view
        return view('login');
    }

    public function postLogin(Request $request)
    {
        // Get user information
        $username = $request->input('username');
        $password = $request->input('password');

        // Check if user exists in database
        $userDB = DB::table('peminjam')->select('id_peminjam', 'username', 'password')->where([['username', '=', strtolower($username)], ['password', '=', $password]]);
        if ($userDB->count() == 0) {
            return redirect('/login')->withErrors(['invalidLogin' => 'Username atau Kata Sandi salah']);
        }

        // Put information in session
        $id = $userDB->first()->id_peminjam;
        $request->session()->put('username', $username);
        $request->session()->put('user_id', $id);

        // Redirect back
        return redirect('/');
    }

    public function getRegister(Request $request)
    {
        // Check if user has already logged in
        if ($request->session()->has('username')) {
            // Redirect back
            return redirect('/');
        }

        //Show register view
        return view('register');
    }

    public function postRegister(Request $request)
    {
        //Get user information
        $username = $request->input('username');
        $password = $request->input('password');

        // Check if user already exists in database
        $userDB = DB::table('peminjam')->select('username', 'password')->where([['username', '=', strtolower($username)]])->count();
        if ($userDB != 0) {
            // Redirect back if user exists
            return redirect('/register')->withErrors(['invalidRegister' => 'Username sudah digunakan']);
        }

        // Insert into database
        DB::table('peminjam')->insert([
            ['username' => $username, 'password' => $password]
        ]);

        // Get new inserted user data
        $userDB = DB::table('peminjam')->select('id_peminjam', 'username', 'password')->where([['username', '=', strtolower($username)], ['password', '=', $password]]);

        // Put user information in session
        if ($userDB->count() != 0) {
            $id = $userDB->first()->id_peminjam;
            $request->session()->put('username', $username);
            $request->session()->put('user_id', $id);
        }

        // Redirect back to main page
        return redirect('/');
    }

    // Get admin login view
    public function getAdminAuthenticate(Request $request)
    {
        // Check if admin has already logged in
        if ($request->session()->has('adminId')) {
            // Redirect to log view if admin already logged in
            return redirect('/admin/log');
        }

        // Show admin's login view
        return view('adminlogin');
    }

    public function postAdminAuthenticate(Request $request)
    {
        // Get admin inputs
        $username = $request->input('username');
        $password = $request->input('password');

        // Check if admin information exists in database
        $userDB = DB::table('admin')->select('id_admin', 'username', 'password')->where([['username', '=', strtolower($username)], ['password', '=', $password]]);
        if ($userDB->count() == 0) {
            // Redirect back to login if admin information doesn't exist
            return redirect('/admin/login')->withErrors(['invalidLogin' => 'Email atau Kata Sandi salah']);
        }

        // Put admin information in session
        $id = $userDB->first()->id_admin;
        $request->session()->put('adminId', $id);

        // Redirect back to admin main view (log view)
        return redirect('/admin/log');
    }

    public function userLogout(Request $request)
    {
        $request->session()->forget('username');
        $request->session()->forget('userId');
        return redirect('/login');
    }

    public function adminLogout(Request $request)
    {
        $request->session()->forget('adminId');
        return redirect('/admin/login');
    }
}
