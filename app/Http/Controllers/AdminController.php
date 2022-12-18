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

    // Get admin add books view
    public function getAddBooks(Request $request)
    {
        // Find out if admin logged in
        if ($request->session()->has('adminId')) {
            return view('adminaddbooks');
        } else {
            // Send back if haven't logged in
            return redirect('/admin/login');
        }
    }

    // Post admin add books
    public function postAddBooks(Request $request)
    {
        // Get book-to-add informations
        $title = $request->input('title');
        $author = $request->input('author');
        $summary = $request->input('summary');
        $releaseYear = $request->input('release_year');

        // Get book cover file and names
        $bookCover = $request->file('cover');
        $bookCoverName = $bookCover->getClientOriginalName();
        $bookCoverExtension = $bookCover->getClientOriginalExtension();

        // Insert file into folder
        $pathToFolder = public_path() . '/book_covers';
        $bookCover->move($pathToFolder, $bookCoverName);

        // Insert into database
        DB::table('buku')->insert([
            ['judul' => $title, 'authors' => $author, 'summary' => $summary, 'release_year' => $releaseYear, 'image_string' => $bookCoverName]
        ]);

        // Redirect back to log
        return redirect('/admin/log');
    }

    // Get admin's book view
    public function getBookView()
    {
        // Get book data from database
        $bookCatalogueCollection = DB::select("SELECT id_buku `Id`, judul `Judul`, authors `Author`, summary `Summary`, release_year `ReleaseYear`, image_string `ImageString` FROM buku");
        return view('adminviewbooks')->with(['bookCollection' => $bookCatalogueCollection]);
    }

    // Get admin edit book's view
    public function getEditBookDetailView($id)
    {
        // Get selected book data based on id passed
        $bookSelected = DB::select("SELECT id_buku `id`, judul `title`, authors `author`, summary `summary`, release_year `release_year`, image_string `image_string` FROM buku WHERE id_buku = '" . $id . "'")[0];
        return view('admineditbooks')->with(['book' => $bookSelected]);
    }

    // Post admin book edit result and updates it on database
    public function postBookEditView(Request $request)
    {
        // Get book-to-add informations
        $id = $request->input('id');
        $title = $request->input('title');
        $author = $request->input('author');
        $summary = $request->input('summary');
        $releaseYear = $request->input('release_year');

        if ($request->hasFile('cover')) {
            // Get book cover file and names
            $bookCover = $request->file('cover');
            $bookCoverName = $bookCover->getClientOriginalName();
            $bookCoverExtension = $bookCover->getClientOriginalExtension();

            // Insert file into folder
            $pathToFolder = public_path() . '/book_covers';
            $bookCover->move($pathToFolder, $bookCoverName);
            DB::table('buku')->where('id_buku', $id)->update([
                'image_string' => $bookCoverName
            ]);
        }
        // Insert into database
        DB::table('buku')->where('id_buku', $id)->update([
            'judul' => $title, 'authors' => $author, 'summary' => $summary, 'release_year' => $releaseYear
        ]);

        // Redirect back to log
        return redirect('/admin/books');
    }

    // Post delete book selected and deletes it from the database
    public function postBookDelete(Request $request)
    {
        // Get id
        $id = $request->input('id');

        // Delete from database
        DB::table('buku')->where('id_buku', $id)->delete();
    }
}
