<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function create(Book $book)
    {
        return view('books.reviews.create', ['book' => $book]);
    }

    public function store(Request $request, Book $book)
    {
        $data = $request->validate([
            'review' => 'required|min:15',
            'rating' => 'required|min:1|max:5|integer'
        ]);

        $book->reviews()->create($data);

        return redirect()->route('books.show', $book);
    }
}