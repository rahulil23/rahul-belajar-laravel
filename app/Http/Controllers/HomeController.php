<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function biodata(){
        return view('biodata');
    }

    public function index(){
        return view('pages.dashboard');
    }

    public function profile(){
        return view('pages.profile');
    }

    public function admin(){
        return view('pages.admin');
    }

    public function user(){
        return view('pages.user');
    }

}
