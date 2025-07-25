<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.ui.homepage');
    }

    public function detail()
    {
        return view('frontend.ui.detailpage');
    }
}
