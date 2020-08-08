<?php


namespace App\Http\Repositories;


use App\Detail;
use Illuminate\Support\Facades\DB;

class DetailsRepositories
{
    protected $detail;

    function __construct(Detail $detail)
    {
        $this->detail = $detail;
    }

    function save($detail){
        $detail->save();
    }

    function showDetailById($id){
        return DB::table('students')
                            ->join('borrows','students.id','borrows.student_id')
                            ->join('details','borrows.id','details.borrow_id')
                            ->join('books','details.book_id','books.id')
                            ->select('students.*','borrows.*','details.*','books.*')
                            ->where('borrows.id','=',"$id")
                            ->get();
    }

    function showFullDetail(){
        return DB::table('students')
            ->join('borrows','students.id','borrows.student_id')
            ->join('details','borrows.id','details.borrow_id')
            ->join('books','details.book_id','books.id')
            ->select('students.*','borrows.*','details.*','books.*')
            ->orderBy('borrows.id','desc')
            ->get();
    }




}
