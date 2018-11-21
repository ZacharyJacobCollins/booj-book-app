<?php

namespace Tests\Unit;

use App\Book;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeleteBookTest extends TestCase
{
    /**
     * Test deleting a book successfully
     *
     * @return void
     */
    public function testDeleteBook()
    {
        $userId = 1;

        $createdBook = Book::create(
            [
                'user_id' => $userId,
                'title' => 'title',
                'author_first_name' => 'firstName',
                'author_last_name' => 'lastName',
                'publication_date' => 'publicationDate'
            ]
        );

        $createdBook->delete();

        $book = Book::find($createdBook->id);

        $this->assertTrue(!$book);
    }
}
