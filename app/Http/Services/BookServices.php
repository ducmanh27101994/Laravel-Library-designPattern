<?php


namespace App\Http\Services;


use App\Book;
use App\Http\Repositories\BookRepositories;
use Illuminate\Http\Request;

class BookServices
{
    protected $bookServices;

    function __construct(BookRepositories $bookRepositories)
    {
        $this->bookServices = $bookRepositories;
    }

    function getAll()
    {
        return $this->bookServices->getAll();
    }

    function store(Request $request)
    {
        $book = new Book();
        $book->book_name = $request->book_name;
        $book->author = $request->author;
        $book->status = $request->status;

        $this->bookServices->save($book);
    }

    function edit($id){
        return $this->bookServices->findById($id);
    }

    function update(Request $request,$id){
        $book = $this->bookServices->findById($id);
        $book->book_name = $request->book_name;
        $book->author = $request->author;
        $book->status = $request->status;

        $this->bookServices->save($book);
    }

    function delete($id){
        $book = $this->bookServices->findById($id);
        $book->delete();
    }

    function search(Request $request){
        return $this->bookServices->search($request);
    }

}
