@extends('core.menu')
@section('tittle','edit book')

@section('content')

    <div class="container">

        <form method="post" action="">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Book</label>
                <input type="text" name="book_name" class="form-control" value="{{$book->book_name}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Author</label>
                <input type="text" name="author" class="form-control" value="{{$book->author}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Status</label>
                <input type="text" name="status" class="form-control" value="{{$book->status}}" >
            </div>


            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

@endsection
