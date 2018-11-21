<?php

namespace App\Http\Controllers;

use App\Book;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /** @var User $user */
        return Auth::user()->books();
    }

    /**
     * Create a new book and return a copy of the book
     *
     * @param $request \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $book = Book::create(
            [
                'user_id' => $request->input('userId'),
                'title' => $request->input('title'),
                'author_first_name' => $request->input('firstName'),
                'author_last_name' => $request->input('lastName'),
                'publication_date' => $request->input('publicationDate'),
            ]
        );
        return $book;
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $book = Book::findOrFail((int) $id);
        return json_encode($book);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $book = Book::findOrFail($request->input('id'));
        $book->delete();
    }
}
