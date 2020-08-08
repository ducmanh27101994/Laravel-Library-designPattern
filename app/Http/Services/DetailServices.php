<?php


namespace App\Http\Services;


use App\Detail;
use App\Http\Repositories\DetailsRepositories;
use Illuminate\Http\Request;

class DetailServices
{
    protected $detailRepo;

    function __construct(DetailsRepositories $detailRepo)
    {
        $this->detailRepo = $detailRepo;
    }

    function store(Request $request){
        $detail = new Detail();
        $detail->book_id = $request->book_id;
        $detail->borrow_id = $request->borrow_id;

        $this->detailRepo->save($detail);
    }

    function showDetailId($id){
        return $this->detailRepo->showDetailById($id);
    }

    function showFullDetail(){
        return $this->detailRepo->showFullDetail();
    }

}
