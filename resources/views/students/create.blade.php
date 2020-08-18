@extends('core.menu')
@section('tittle','create student')

@section('content')
    <div class="container">

        <form method="post" action="{{route('students.store')}}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Student</label>
                <input type="text" name="student_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('student_name')}}">
                @if($errors->has('student_name'))
                    <p style="color:red">{{$errors->first('student_name')}}</p>
                @endif
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Class</label>
                <input value="{{old('class')}}" type="text" name="class" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                @if($errors->has('class'))
                    <p style="color:red">{{$errors->first('class')}}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Phone</label>
                <input value="{{old('phone')}}" type="text" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                @if($errors->has('phone'))
                    <p style="color:red">{{$errors->first('phone')}}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Address</label>
                <input value="{{old('address')}}" type="text" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                @if($errors->has('address'))
                    <p style="color:red">{{$errors->first('address')}}</p>
                @endif
            </div>

            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div class="error-message">
{{--            @if ($errors->any())--}}
{{--                @foreach($errors->all() as $nameError)--}}
{{--                    <p style="color:red">{{ $nameError }}</p>--}}
{{--                @endforeach--}}
{{--            @endif--}}
        </div>
    </div>

@endsection
