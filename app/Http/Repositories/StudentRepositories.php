<?php


namespace App\Http\Repositories;


use App\Student;
use Illuminate\Http\Request;

class StudentRepositories
{
    protected $student;

    function __construct(Student $student)
    {
        $this->student = $student;
    }

    function getAll(){
        return $this->student->select('*')->orderBy('id','desc')->get();
    }

    function save($student){
        $student->save();
    }

    function findById($id){
        return $this->student->findOrFail($id);
    }
}
