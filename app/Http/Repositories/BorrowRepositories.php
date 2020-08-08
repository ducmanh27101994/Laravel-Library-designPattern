<?php


namespace App\Http\Repositories;


use App\Borrow;

class BorrowRepositories
{
    protected $borrow;

    function __construct(Borrow $borrow)
    {
        $this->borrow = $borrow;
    }

    function getAll(){
        return $this->borrow->select('*')->orderBy('id','desc')->get();
    }

    function save($borrow){
        $borrow->save();
    }

    function findById($id){
        return $this->borrow->findOrFail($id);
    }


}
