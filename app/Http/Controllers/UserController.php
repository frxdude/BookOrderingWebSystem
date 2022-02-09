<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use DB;

class UserController extends Controller
{
    public function login(Request $req) {
        $req->validate(['username' => ['required','regex:/^[a-zA-Zа-яА-Я0-9]/']]);
        // $response = DB::table('users')->where('username',$req->username)->get();
        $response = DB::select('select * from users where username = ? and password = ?', [$req->username, md5($req->password)]);
        if(count($response)==0)
            return redirect()->back()->withErrors('Хэрэглэгч олдсонгүй');
        if($req->rememberme == 'on'){
            Cookie::queue('remembermeadmin', $req->username);
            Cookie::queue('remembermeadminpass', $req->password);
        }
        else{
            Cookie::queue(Cookie::forget('remembermeadmin'));
            Cookie::queue(Cookie::forget('remembermeadminpass'));
        }
        Cookie::queue('adminId', $response[0]->id);
        return redirect('admin/history'); 
    }

    public function getHistory(Request $req) {
        if($req->cookie('adminId') == '' || $req->cookie('adminId') == null)
            return redirect('/');
        $response = DB::table('books')->select('books.*', 'orders.created_at AS orderDate', 'authors.*', 'orders.*')->join('orders', 'orders.bookId', '=', 'books.id')->join('authors', 'authors.id', '=', 'books.authorId')->get();
        // echo $response;
        return view('user.history',['orders' => $response]);
    }

    public function getBooks(Request $req) {
        if($req->cookie('adminId') == '' || $req->cookie('adminId') == null)
            return redirect('/');
        $response = DB::table('books')->select('books.*', 'authors.*')->join('authors', 'authors.id', '=', 'books.authorId')->get();
        // echo $response;
        return view('user.books',['books' => $response]);
    }

}
