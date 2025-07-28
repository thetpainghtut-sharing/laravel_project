<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
class FrontendController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('frontend.ui.homepage', compact('books'));
    }

    public function detail($id)
    {
        $book = Book::find($id);
        return view('frontend.ui.detailpage', compact('book'));
    }

    public function cart()
    {
        return view('frontend.ui.cartpage');
    }
}
