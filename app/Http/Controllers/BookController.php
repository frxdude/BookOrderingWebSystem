<?php
//B180910040 Sainjargal
namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use DB;

class BookController extends Controller
{
    public function getBooks(Request $req){
        if($req->cookie('userId') == '' || $req->cookie('userId') == null)
            return redirect('/');
        $orders = DB::table('orders')->where('active', 1)->get();

        for($i = 0 ; $i<count($orders) ; $i += 1)
            if($orders[$i]->created_at < Carbon::now()->subHours(168) && $orders[$i]->fined == 0)
            {
                $fine = DB::table('customers')->where('id', $orders[$i]->userId)->get()[0]->fine;
                DB::update('update customers set fine = ? where id = ?', [$fine + 5000, $orders[$i]->userId]);
                DB::update('update orders set fined = ? where id = ?', [1, $orders[$i]->id]);
            }

        $books = DB::table('books')->get();
        return view('book.books', ['books' => $books]);
    }

    public function getInfoById($bookId){
        $deadline = Carbon::now()->addMinutes(60);
        $orders = DB::table('orders')->where('active', 1)->get();
        $book = DB::table('books')->where('id', $bookId)->get()[0];
        $author = DB::table('authors')->where('id', $book->authorId)->get()[0];
        for($i = 0 ; $i<count($orders) ; $i += 1)
        {
            if($orders[$i]->created_at < Carbon::now()->subHours(24))
            {
                DB::update('update books set total = ? where id = ?', [$orders[$i]->total + $book->total, $bookId]);
                DB::update('update orders set active = ? where id = ?', [false, $orders[$i]->id]);
            }
        }
        return view('book.bookInfo', ['book' => $book, 'author' => $author]);
    }

    public function orderBook(Request $req){
        if($req->cookie('userId') == '' || $req->cookie('userId') == null)
            return redirect('/');
        if($req->action == "Татах")
            return view('customer.transactionScreen', ['userId' => $req->cookie('userId'), 'price' => $req->price]);
        // $book = DB::table('books')->where('id', $req->id)->get()[0];
        // $realTotal = $book->total - $req->total;
        DB::beginTransaction();
        try {
            DB::insert('insert into orders (bookId, total, created_at, active, rented, userId) values (?, ?, ?, ?, ?, ?)', 
                [$req->id, $req->total, Carbon::now(), 1, $req->action == "Түрээслэх" ? 1 : 0, $req->cookie('userId')]);
            // DB::update('update books set total = ? where id = ?', [$realTotal, $req->id]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('/books/' . $req->id);
        }
        return redirect('/books/' . $req->id)->withSuccess('Захиалга амжилттай');
    }

    public function getAddBook(Request $req) {
        $authors = DB::table('authors')->get();
        return view('user.addBook', ['authors' => $authors]);
    }

    public function addBook(Request $req){
        if($req->cookie('adminId') == '' || $req->cookie('adminId') == null)
            return redirect('/admin');
            
        DB::beginTransaction();
        try {
            if($req->lastName != '' || $req->lastName != null)
            {
                echo "1";
                DB::insert('insert into authors (lastName, firstName, created_at) values (?, ?, ?)', [$req->lastName, $req->firstName, Carbon::now()]);
                $lastId = DB::getPdo()->lastInsertId();
                // DB::insert('insert into books (authorId, name, eBook, created_at, pic, description, price, pBook, total) values (?, ?, ?, ?, ?, ?, ?, ?, ?)', 
                //     [$lastId, $req->name, $req->eBook=="on" ? 1 : 0, Carbon::now(), $req->pic, $req->description, $req->price, $req->pBook=="on" ? 1 : 0, $req->total]); 
            
                DB::insert('insert into books (authorId, name, eBook, created_at, pic, description, price, pBook, total) values (?, ?, ?, ?, ?, ?, ?, ?, ?)', 
                [$lastId, htmlspecialchars($req->name, ENT_QUOTES, 'UTF-8'),
                                            $req->eBook=="on" ? 1 : 0,
                                            Carbon::now(),
                                            $req->pic,
                                            htmlspecialchars($req->description, ENT_QUOTES, 'UTF-8'),
                                            $req->price,
                                            $req->pBook=="on" ? 1 : 0,
                                            $req->total]); 
            }
            else{
                echo "2";
                DB::insert('insert into books (authorId, name, eBook, created_at, pic, description, price, pBook, total) values (?, ?, ?, ?, ?, ?, ?, ?, ?)', 
                    [$req->authorId, htmlspecialchars($req->name, ENT_QUOTES, 'UTF-8'), $req->eBook=="on" ? 1 : 0, Carbon::now(), $req->pic, htmlspecialchars($req->description, ENT_QUOTES, 'UTF-8'), $req->price, $req->pBook=="on" ? 1 : 0, $req->total]);    
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('/book/add');
        }
        return redirect('/book/add')->withSuccess('Амжилттай');
    }
}
