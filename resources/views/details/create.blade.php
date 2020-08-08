@extends('core.menu')
@section('tittle','create detail')

@section('content')

    <div class="container">

        <form method="post" action="{{route('details.store')}}">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlSelect1">List Book</label>
                <select name="book_id" class="form-control" id="exampleFormControlSelect1">
                    @foreach($books as $book)
                        <option value="{{$book->id}}">{{$book->book_name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">List Borrow</label>
                <select name="borrow_id" class="form-control" id="exampleFormControlSelect1">
                    @foreach($borrows as $borrow)
                        <option value="{{$borrow->id}}">Card: {{$borrow->id}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

@endsection
