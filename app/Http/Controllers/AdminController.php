<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{

    // Get admin log view
    public function getLog(Request $request)
    {
        // Find out if admin logged in
        if ($request->session()->has('adminId')) {
            // Get data to put in view
            $allData = DB::select('SELECT peminjam.username `name`, buku.judul `title`, buku.authors `authors`, buku.release_year `release_year`, pinjaman.tanggal_pinjam `tanggal_pinjam`, pinjaman.tanggal_kembali `tanggal_kembali` FROM peminjam, pinjaman, buku WHERE peminjam.id_peminjam = pinjaman.id_peminjam AND buku.id_buku = pinjaman.id_buku');
            return view('adminlog')->with(['logData' => $allData]);
        } else {
            // Send back if haven't logged in
            return redirect('/admin/login');
        }
    }

    // Get admin add borrowing view
    public function getAddBorrowing(Request $request)
    {
        // Find out if admin logged in
        if ($request->session()->has('adminId')) {
            //Get data to put in view
            $usersData = DB::select("SELECT id_peminjam `id`, username `username`  FROM peminjam");
            $booksData = DB::select("SELECT id_buku `id`, judul `title`  FROM buku");
            return view('adminaddborrowing')->with(['names' => $usersData, 'books' => $booksData]);
        } else {
            // Send back if haven't logged in
            return redirect('/admin/login');
        }
    }

    // Post admin add borrowing view
    public function postAddBorrowing(Request $request)
    {
        // Get information to insert into database
        $userId = $request->input('name');
        $bookId = $request->input('book');
        $tanggalPinjam = $request->input('tanggal_pinjam');

        // Insert into database process
        DB::table('pinjaman')->insert([
            ['id_peminjam' => $userId, 'id_buku' => $bookId, 'tanggal_pinjam' => Carbon::parse($tanggalPinjam), 'tanggal_kembali' => Carbon::parse($tanggalPinjam)->addDays(7)]
        ]);

        // Return to main view
        return redirect('/admin/log');
    }
}
