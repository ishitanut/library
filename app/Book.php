<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Book extends Model
{
    protected $table="book";
    protected $primaryKey="b_id";

    public static function delBook($b_id)
    {
        DB::delete('delete from book where b_id = ?',[$b_id]);
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

