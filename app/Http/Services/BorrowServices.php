<?php


namespace App\Http\Services;


use App\Borrow;
use App\Http\Repositories\BorrowRepositories;
use App\Http\Repositories\StudentRepositories;
use Illuminate\Http\Request;

class BorrowServices
{
    protected $borrowRepo;


    function __construct(BorrowRepositories $borrowRepo)
    {
        $this->borrowRepo = $borrowRepo;
    }

    function getAll(){
        return $this->borrowRepo->getAll();
    }

    function store(Request $request){
        $borrow = new Borrow();
        $borrow->borrow_date = $request->borrow_date;
        $borrow->return_date = $request->return_date;
        $borrow->status	= $request->status;
        $borrow->student_id = $request->student_id;

        $this->borrowRepo->save($borrow);
    }

    function edit($id){
        return $this->borrowRepo->findById($id);
    }

    function update(Request $request,$id){
        $borrow = $this->borrowRepo->findById($id);
        $borrow->borrow_date = $request->borrow_date;
        $borrow->return_date = $request->return_date;
        $borrow->status	= $request->status;
        $borrow->student_id = $request->student_id;

        $this->borrowRepo->save($borrow);
    }

    function delete($id){
        $borrow = $this->borrowRepo->findById($id);
        $borrow->delete();
    }

}
