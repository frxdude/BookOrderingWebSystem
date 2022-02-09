<?php
namespace App\Http\Controllers;
//B180910040 Sainjargal
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Mail\AuthMail;
use DB;

class CustomerController extends Controller
{
    public function addCustomer(Request $req){
        $req->validate([
            'username' => ['required','regex:/^[a-zA-Zа-яА-Я0-9]/'],
            'registerNumber' => ['required','max:8','regex:/^[0-9]/'],
            'phoneNumber' => ['required','digits_between:0,9|max:8|min:8'],
            'email' => ['required','email','max:255','regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix','unique:customers'],
            'address' => ['required','max:255'],
            'cardNumber' => ['required','numeric','digits:16'],
        ]);
        $regNum = $req->firstSelect . $req->secondSelect . strval($req->registerNumber);
        $this->sendMail("register", $req->email);
        DB::insert('insert into customers(username, registerNumber, phoneNumber, address, email, cardNumber, created_at)
            values(?,?,?,?,?,?,now())',[$req->username, $regNum, $req->phoneNumber, 
                                        $req->address, $req->email, $req->cardNumber]);
        return view('customer.auth', ['username' => $req->username]);
    }
    
    public function login(Request $req){
        $req->validate(['username' => ['required','regex:/^[a-zA-Zа-яА-Я0-9]/']]);
        $response = DB::table('customers')->where('username',$req->username)->get();
        if(count($response)==0)
            return redirect()->back()->withErrors('Хэрэглэгч олдсонгүй');
        if($req->rememberme == 'on')
            Cookie::queue('rememberme', $req->username);
        else
            Cookie::queue(Cookie::forget('rememberme'));
        $this->sendMail("login", $response[0]->email);
        return view('customer.auth', ['username' => $req->username]);
    }

    public function authCheck(Request $req) {
        $authCode = $req->d1 . $req->d2 . $req->d3 . $req->d4 . $req->d5 . $req->d6;
        if(strcmp(strtoupper($authCode),$req->cookie('authCode'))<1)
        {
            $response = DB::table('customers')->where('username',$req->username)->get();
            Cookie::queue(Cookie::forget('authCode'));
            Cookie::queue('userId', $response[0]->id);
            return redirect('/books');
        }
        else
            return redirect('/auth')->withErrors('Баталгаажуулах код тохирохгүй байна.');
    }

    public function sendMail($type, $email) {
        $authCode = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 3);
        $authCode .= '-';
        $authCode .= substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 3);
        $data = array('authCode'=>$authCode);
        Cookie::queue('authCode', substr($authCode, 0, 3) . substr($authCode, 4, 6), 10);
        Mail::to($email)->send(new AuthMail($data, $type));
        return true;
    }

    public function getTransactionScreen(Request $req) {
        if($req->cookie('userId') == '' || $req->cookie('userId') == null)
            return redirect('/');
        return view('customer.transactionScreen', ['userId' => $req->id, 'totalPrice' => $req->totalPrice]);
    }

    public function doTransaction(Request $req) {
        $customer = DB::table('customers')->where('id', $req->id)->get()[0];
        $newBalance = $customer->balance - $req->priceTotal;
        if($newBalance >= 0)
            DB::update('update customers set balance = ? where id = ?', [$newBalance, $req->id]);
        else 
            return redirect()->back()->withErrors('Дансны үлдэгдэл хүрэлцэхгүй байна.');
        return redirect()->back()->withSuccess('Гүйлгээ амжилттай');
    }

    public function getHistory(Request $req) {
        if($req->cookie('userId') == '' || $req->cookie('userId') == null)
            return redirect('/');
        $response = DB::table('books')->select('books.*', 'orders.created_at AS orderDate', 'authors.*', 'orders.*')->join('orders', 'orders.bookId', '=', 'books.id')->join('authors', 'authors.id', '=', 'books.authorId')->where('orders.userId', $req->cookie('userId'))->get();
        // $response = DB::statement('SELECT * FROM books b INNER JOIN orders o ON b.id = o.bookId INNER JOIN authors a ON b.authorId = a.id WHERE o.userId = ?', [$req->cookie('userId')]);
        return view('customer.history', ['orders' => $response]);
    }

    public function getProfile(Request $req) {
        if($req->cookie('userId') == '' || $req->cookie('userId') == null)
            return redirect('/');
        $response = DB::table('customers')->where('id', $req->cookie('userId'))->get()[0];
        return view('customer.profile', ['customer' => $response]);
    }

    public function logout(Request $req) {
        Cookie::queue(Cookie::forget('userId'));
        return redirect('/login');
    }
}
