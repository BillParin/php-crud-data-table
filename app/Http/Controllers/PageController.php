<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Yajra\Datatables\Datatables;


class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function catalog()
    {
        return view('pagecatalog/catalog');
    }

    public function action()
    {
        return view('pagecatalog/action');
    }

    public function hardware()
    {
        return view('pagecatalog/hardware');
    }

    public function software()
    {
        return view('pagecatalog/software');
    }

    public function network()
    {
        return view('pagecatalog/network');
    }

    public function userinfo()
    {
        return view('pagecatalog/userinfo');
    }

    public function hardwareline()
    {
        return view('pagecatalog/hardwareline');
    }

}
