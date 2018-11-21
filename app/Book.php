<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
//    /**
//     * The user id of the user the book belongs to
//     * @var string
//     */
//    public $user_id;
//
//    /**
//     * The first name of the author of the book
//     * @var string
//     */
//    public $author_first_name;
//
//    /**
//     * The last name of the author of the book
//     * @var string
//     */
//    public $author_last_name;
//
//    /**
//     * Title of the book
//     * @var string
//     */
//    public $title;
//
//    /**
//     * Publication date of the book
//     * @var \DateTime
//     */
//    public $publication_date;

    protected $fillable = [
        'title', 'user_id', 'author_first_name', 'author_last_name', 'publication_date'
    ];
}
