@extends('core.menu')
@section('tittle','create student')

@section('content')
    <div class="container">

        <form method="post" action="{{route('students.store')}}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Student</label>
                <input type="text" name="student_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Class</label>
                <input type="text" name="class" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Phone</label>
                <input type="text" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Address</label>
                <input type="text" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div class="error-message">
            @if ($errors->any())
                @foreach($errors->all() as $nameError)
                    <p style="color:red">{{ $nameError }}</p>
                @endforeach
            @endif
        </div>
    </div>

@endsection
