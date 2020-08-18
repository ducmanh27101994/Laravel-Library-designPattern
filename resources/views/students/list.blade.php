@extends('core.menu')
@section('tittle','list student')

@section('content')



    <div class="container">
    <a href="{{route('students.create')}}">Add Student</a>

        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Student Name</th>
                <th scope="col">Class</th>
                <th scope="col">Phone</th>
                <th scope="col">Address</th>
                <th scope="col" colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>
            @if(empty($students))
            <tr>
                <td>No data</td>
            </tr>
            @else
            @foreach($students as $key => $student)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$student->student_name}}</td>
                    <td>{{$student->class}}</td>
                    <td>{{$student->phone}}</td>
                    <td>{{$student->address}}</td>
                    <td><a href="{{route('students.edit',$student->id)}}">Edit</a> </td>
                    <td><a href="{{route('students.delete',$student->id)}}">Delete</a> </td>
                </tr>

            @endforeach
            @endif

            </tbody>
        </table>
    </div>

@endsection
