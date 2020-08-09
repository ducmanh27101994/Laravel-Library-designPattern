<?php


namespace App\Http\Repositories;


use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookRepositories
{
    protected $book;

    function __construct(Book $book)
    {
        $this->book = $book;
    }

    function getAll(){
//        return $this->book->select('*')->orderBy('id','desc')->get();
        return DB::table('books')->select('*')->orderBy('id','desc')->paginate(5);
    }

    function findById($id){
        return $this->book->findOrFail($id);
    }

    function save($book){
        $book->save();
    }

    function search(Request $request){
//        return $this->book->where('book_name','like','%'.$request->keyword.'%')->get();
        return DB::table('books')->select('*')->where('book_name','like','%'.$request->keyword.'%')->orderBy('id','desc')->paginate(5);
    }


}
