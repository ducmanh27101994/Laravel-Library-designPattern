@extends('core.menu')
@section('tittle','list book')

@section('content')

    <div class="container">
        <a href="{{route('books.create')}}">Add Book</a>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Book Name</th>
                <th scope="col">Author</th>
                <th scope="col">Status</th>
                <th scope="col" colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>
            @if(empty($books))
                <tr>
                    <td>No data</td>
                </tr>
            @else
                @foreach($books as $key => $book)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$book->book_name}}</td>
                        <td>{{$book->author}}</td>
                        <td>{{$book->status}}</td>
                        <td><a href="{{route('books.edit',$book->id)}}">Edit</a> </td>
                        <td><a href="{{route('books.delete',$book->id)}}">Delete</a> </td>
                    </tr>

                @endforeach
            @endif

            </tbody>
        </table>
        {{$books->links()}}
    </div>

@endsection
