<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $gender = $request->query('gender');
        $id_class = $request->query('id_class');
        $books = (New Books)->getBooksData($gender, $id_class);
        return response()->json($books);
    }
    public function create(Request $request)
    {
        $name = $request->input('name');
        $author = $request->input('author');
        $gender = $request->input('gender');
        $id_class = $request->input('id_class');
        $books = (new Books)->postBooksData($name, $author, $gender, $id_class);
        return response()->json($books);
    }
    public function destroy($id)
    {
        if (Books::where('id', $id)->exists()) {
            $book = Books::find($id);
            $book->delete();

            return response()->json([
                "message" => "records deleted."
            ], 202);
        } else {
            return response()->json([
                "message" => "book not found."
            ], 404);
        }
    }
}
