@extends('core.menu')
@section('tittle','edit borrow')

@section('content')

    <div class="container">

        <form method="post" action="">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Borrow Date</label>
                <input type="date" name="borrow_date" class="form-control" value="{{$borrow->borrow_date}}" >
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Return Date</label>
                <input type="date" name="return_date" class="form-control" value="{{$borrow->return_date}}" >
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Status</label>
                <input type="text" name="status" class="form-control" value="Return Borrow" readonly>
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Student</label>
                <select name="student_id" class="form-control" id="exampleFormControlSelect1">
                    @foreach($students as $student)
                        <option @if($student->id == $borrow->student_id) selected @endif value="{{$student->id}}">{{$student->student_name}}</option>
                    @endforeach
                </select>
            </div>

            <label for="exampleFormControlSelect1">Book</label>
            @foreach($books as $book)
                <div class="checkbox">
                    <label><input name="book[{{$book->id}}]" type="checkbox" value="{{$book->id}}"
                                  @foreach ($borrow->books as $book1)
                                  @if ($book->id == $book1->id)
                                  checked
                            @endif
                            @endforeach
                        >{{$book->book_name}}
                    </label>
                </div>
            @endforeach


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

@endsection
