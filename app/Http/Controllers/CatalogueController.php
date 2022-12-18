<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CatalogueController extends Controller
{
    public function getCatalogue(){
        $bookCatalogueCollection = DB::select("SELECT id_buku `id`, judul `Judul`, authors `Author`, summary `Summary`, release_year `ReleaseYear`, image_string `ImageString` FROM buku");
        return view('catalogue')->with(['bookCollection' => $bookCatalogueCollection]);
    }

    public function postCatalogueSelected(Request $request){
        $id = $request->input('id');
        $bookSelected = DB::select("SELECT judul `Judul`, authors `Author`, summary `Summary`, release_year `ReleaseYear`, image_string `ImageString` FROM buku WHERE id_buku = " . $id)[0];
        return view('bookdetail')->with(['bookSelected' => $bookSelected]);
    }

    public function postBorrowBook(Request $request){
        $id = $request->input('id');
        DB::table('pinjaman')->insert([
            ['id_peminjam' => $request->session()->get('user_id')],
            ['id_buku' => $id],
            ['tanggal_pinjam' => Carbon::now()],
            
        ]);
    }
}