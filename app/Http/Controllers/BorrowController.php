<?php

namespace App\Http\Controllers;

use App\Http\Services\BorrowServices;
use App\Http\Services\StudentServices;
use App\Student;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    protected $borrowService;
    protected $studentService;

    function __construct(BorrowServices $borrowService,
                         StudentServices $studentService)
    {
        $this->borrowService = $borrowService;
        $this->studentService = $studentService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $borrows = $this->borrowService->getAll();

        return view('borrows.list', compact('borrows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $students = $this->studentService->getAll();
        return view('borrows.create',compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->borrowService->store($request);
        return redirect()->route('details.create');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $borrow = $this->borrowService->edit($id);
        $students = $this->studentService->getAll();
        return view('borrows.edit',compact('borrow','students',$borrow->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->borrowService->update($request,$id);
        return redirect()->route('borrows.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->borrowService->delete($id);
        return redirect()->route('borrows.index');
    }
}
