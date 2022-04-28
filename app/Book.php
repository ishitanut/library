<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table="book";
    protected $primaryKey="b_id";
    protected $filllable=['name',
                         'author',
                         'category',
                         'publisher'];

    public static function deleteBook($b_id)
    {
        $data=Book::find($b_id);
        $data->delete();
    }
    public static function storeBook($name,$author,$category,$publisher)
    {
        $book= new Book();
        $book->name=$name;
        $book->author=$author;
        $book->category=$category;
        $book->publisher=$publisher;
        $book->save();
    }
    public static function updateBook($b_id,$name,$author,$category,$publisher)
    {
      $book=Book::find($b_id);
      $book->name=$name;
      $book->author=$author;
      $book->category=$category;
      $book->publisher=$publisher;
      $book->save();
    }
}

