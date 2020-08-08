@extends('core.menu')
@section('tittle','list borrow')

@section('content')

    <div class="container">
        <a href="{{route('borrows.create')}}">Add Borrow</a>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Borrow Date</th>
                <th scope="col">Return Date</th>
                <th scope="col">Status</th>
                <th scope="col">Student</th>
                <th scope="col" colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>
            @if(empty($borrows))
                <tr>
                    <td>No data</td>
                </tr>
            @else
                @foreach($borrows as $key => $borrow)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$borrow->borrow_date}}</td>
                        <td>{{$borrow->return_date}}</td>
                        <td>{{$borrow->status}}</td>
                        @if($borrow->student)
                            <td>{{$borrow->student->student_name}}</td>
                        @else
                            <td>Not classified</td>
                        @endif
                        <td><a href="{{route('borrows.edit',$borrow->id)}}">Edit</a> </td>
                        <td><a href="{{route('borrows.delete',$borrow->id)}}">Delete</a> </td>
                    </tr>

                @endforeach
            @endif

            </tbody>
        </table>
    </div>

@endsection
