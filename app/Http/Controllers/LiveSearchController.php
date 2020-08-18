<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LiveSearchController extends Controller
{
    //
    function index(){
        $books = DB::table('books')->paginate(3);
        return view('search.search', compact('books'));
    }

    function search(Request $request){


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
