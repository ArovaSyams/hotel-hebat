<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user.home');
    }
    
    public function histori() 
    {
        return view('user.histori', [
            'pemesanan' => Pemesanan::all()
        ]);
    }

    public function invoice($id) 
    {
        return view('user.invoice', [
            'pemesanan' => Pemesanan::find($id)
        ]);
    }

    public function adminHome() 
    {
        return view('admin.adminhome');
    }
    
}
