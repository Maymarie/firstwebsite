<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // List all books
    public function index()
    {
        return response()->json(Book::all());
    }

    // Show a single book
    public function show($id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['error' => 'Book not found'], 404);
        }
        return response()->json($book);
    }

    // Create a new book
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:books',
            'description' => 'required',
        ]);

        $book = Book::create($validated);
        return response()->json($book, 201);
    }

    // Update an existing book
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['error' => 'Book not found'], 404);
        }

        $validated = $request->validate([
            'title' => 'required|unique:books,title,' . $id,
            'description' => 'required',
        ]);

        $book->update($validated);
        return response()->json($book);
    }

    // Delete a book
    public function destroy($id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['error' => 'Book not found'], 404);
        }

        $book->delete();
        return response()->json(['message' => 'Book deleted successfully']);
    }
}