<?php

namespace App\Http\Controllers;

use App\Http\Services\BookServices;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    protected $bookServices;

    function __construct(BookServices $bookServices)
    {
        $this->bookServices = $bookServices;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $books = $this->bookServices->getAll();
        return view('books.list',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->bookServices->store($request);
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $book = $this->bookServices->edit($id);
        return view('books.edit',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->bookServices->update($request,$id);
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->bookServices->delete($id);
        return redirect()->route('books.index');
    }

    function search(Request $request){
//        $books = $this->bookServices->search($request);
//        return view('books.list',compact('books'));

        if ($request->ajax()){
            if ($request->ajax()){
                $output = '';
                $books = DB::table('books')->where('book_name', 'LIKE', '%' . $request->search . '%')->get();
                if ($books){
                    foreach ($books as $key => $book){
                        $output .= '<tr>
                    <td>' . $book->id . '</td>
                    <td>' . $book->book_name . '</td>
                    <td>' . $book->author . '</td>
                    <td>' . $book->status . '</td>

                    </tr>';
                    }
                }

                return Response($output);
            }
        }

    }
}
