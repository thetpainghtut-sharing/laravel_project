<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Author;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('backend.book.list', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $authors = Author::all();
        return view('backend.book.create', compact('categories', 'authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'bookName' => 'required|string|max:100|min:3',
            'bookAuthor' => 'required|exists:authors,id',
            'bookPrice' => 'required|numeric',
            'bookCategory' => 'required|exists:categories,id',
            'bookImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'bookDescription' => 'required|string',
        ]);

        $book = new Book();
        $book->name = $request->bookName;
        $book->author_id = $request->bookAuthor;
        $book->price = $request->bookPrice;
        $book->category_id = $request->bookCategory;
        $book->description = $request->bookDescription;

        if ($request->hasFile('bookImage')) {
            $image = $request->file('bookImage');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $uploadPath = public_path('images/books');
            $image->move($uploadPath, $imageName);
            $book->image = 'images/books/' . $imageName;
        }

        $book->save();

        return redirect()->route('books.index')->with('success', 'Book created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {   
        $categories = Category::all();
        $authors = Author::all();
        return view('backend.book.edit', compact('book', 'categories', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'bookName' => 'required|string|max:100|min:3',
            'bookAuthor' => 'required|exists:authors,id',
            'bookPrice' => 'required|numeric',
            'bookCategory' => 'required|exists:categories,id',
            'bookImage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'bookDescription' => 'required|string',
        ]);

        // $book = new Book();
        $book->name = $request->bookName;
        $book->author_id = $request->bookAuthor;
        $book->price = $request->bookPrice;
        $book->category_id = $request->bookCategory;
        $book->description = $request->bookDescription;

        if ($request->hasFile('bookImage')) {
            // Delete the old image if it exists
            if ($book->image && file_exists(public_path($book->image))) {
                unlink(public_path($book->image));
            }

            // Upload the new image
            $image = $request->file('bookImage');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $uploadPath = public_path('images/books');
            $image->move($uploadPath, $imageName);
            $book->image = 'images/books/' . $imageName;
        }

        $book->save();

        return redirect()->route('books.index')->with('success', 'Book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
