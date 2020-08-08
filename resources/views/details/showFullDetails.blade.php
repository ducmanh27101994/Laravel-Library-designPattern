@extends('core.menu')
@section('tittle','List Detail')

@section('content')

    <div class="container">

        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Card</th>
                <th scope="col">Student</th>
                <th scope="col">Class</th>
                <th scope="col">Phone</th>
                <th scope="col">Book</th>
                <th scope="col">Author</th>
                <th scope="col">Status</th>
                <th scope="col">Borrow Date</th>
                <th scope="col">Return Date</th>
            </tr>
            </thead>
            <tbody>
            @if(empty($details))
                <tr>
                    <td>No data</td>
                </tr>
            @else
                @foreach($details as $key => $detail)
                    <tr>

                        <td>{{++$key}}</td>
                        <td>
                        <a href="{{route('details.showId',$detail->borrow_id)}}">
                        Card: {{$detail->borrow_id}}
                        </a>
                        </td>
                        <td>{{$detail->student_name}}</td>
                        <td>{{$detail->class}}</td>
                        <td>{{$detail->phone}}</td>
                        <td>{{$detail->book_name}}</td>
                        <td>{{$detail->author}}</td>
                        <td>{{$detail->status}}</td>
                        <td>{{$detail->borrow_date}}</td>
                        <td>{{$detail->return_date}}</td>
                    </tr>

                @endforeach
            @endif

            </tbody>
        </table>
    </div>

@endsection
