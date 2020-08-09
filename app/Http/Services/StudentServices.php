<?php


namespace App\Http\Services;



use App\Http\Repositories\StudentRepositories;
use App\Http\Requests\RequestStudent;
use App\Student;
use Illuminate\Http\Request;

class StudentServices
{
    protected $studentRepo;

    function __construct(StudentRepositories $studentRepo)
    {
        $this->studentRepo = $studentRepo;
    }

    function getAll(){
        return $this->studentRepo->getAll();
    }

    function store(RequestStudent $request){
        $student = new Student();
        $student->student_name = $request->student_name;
        $student->class = $request->class;
        $student->phone = $request->phone;
        $student->address = $request->address;

        $this->studentRepo->save($student);
    }

    function edit($id){
        return $this->studentRepo->findById($id);
    }

    function update(Request $request,$id){
        $student = $this->studentRepo->findById($id);
        $student->student_name = $request->input('student_name');
        $student->class = $request->input('class');
        $student->phone = $request->input('phone');
        $student->address = $request->input('address');

        $this->studentRepo->save($student);
    }

    function delete($id){
        $student = $this->studentRepo->findById($id);
        $student->delete();
    }

}
