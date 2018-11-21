<?php

namespace Tests\Unit;

use App\Book;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AddBookTest extends TestCase
{
    /**
     * Test and insure book is created / inserted into the database
     *
     * @return void
     */
    public function testAddBook()
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

        $book = Book::findOrFail($createdBook->id);

        $this->assertTrue($book->title === 'title');
    }
}
