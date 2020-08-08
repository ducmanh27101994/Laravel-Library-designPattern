@extends('core.menu')
@section('tittle','create borrow')

@section('content')

    <div class="container">

        <form method="post" action="">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Borrow Date</label>
                <input type="date" name="borrow_date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Return Date</label>
                <input type="date" name="return_date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Status</label>
                <input type="text" name="status" class="form-control" value="Borrow" readonly>
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Student</label>
                <select name="student_id" class="form-control" id="exampleFormControlSelect1">
                    @foreach($students as $student)
                        <option value="{{$student->id}}">{{$student->student_name}}</option>
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
