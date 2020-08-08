<?php


namespace App\Http\Repositories;


use App\Book;
use Illuminate\Http\Request;

class BookRepositories
{
    protected $book;

    function __construct(Book $book)
    {
        $this->book = $book;
    }

    function getAll(){
        return $this->book->select('*')->orderBy('id','desc')->get();
    }

    function findById($id){
        return $this->book->findOrFail($id);
    }

    function save($book){
        $book->save();
    }

    function search(Request $request){
        return $this->book->where('book_name','like','%'.$request->keyword.'%')->get();
    }
}
