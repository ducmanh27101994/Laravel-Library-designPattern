<?php

namespace App\Http\Controllers;

use App\Http\Services\BookServices;
use App\Http\Services\BorrowServices;
use App\Http\Services\DetailServices;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    //
    protected $bookServices;
    protected $borrowServices;
    protected $detailServices;

    function __construct(BookServices $bookServices,
                         BorrowServices $borrowServices,
                        DetailServices $detailServices)
    {
        $this->bookServices = $bookServices;
        $this->borrowServices = $borrowServices;
        $this->detailServices = $detailServices;
    }

    function create(){
        $books = $this->bookServices->getAll();
        $borrows = $this->borrowServices->getAll();
        return view('details.create',compact('books','borrows'));
    }

    function store(Request $request){
        $this->detailServices->store($request);
        return redirect()->route('borrows.index');
    }

    function showDetailById($id){
        $details = $this->detailServices->showDetailId($id);
        return view('details.showDetailById',compact('details'));
    }

    function showFullDetails(){
        $details = $this->detailServices->showFullDetail();
        return view('details.showFullDetails',compact('details'));
    }

}
