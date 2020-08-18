@extends('core.menu')
@section('tittle','list book')

@section('content')

    <div class="container">
        <a href="{{route('books.create')}}">Add Book</a>

        <div class="form-group">
            <input type="text" class="form-controller" id="search" name="search">
        </div>

        <!-- Basic dropdown -->
        <button class="btn btn-primary dropdown-toggle mr-4" type="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">Basic dropdown</button>

        <div class="dropdown-menu">
            <a class="dropdown-item">
                <!-- Default unchecked -->
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="checkbox1" checked>
                    <label id="click-book" class="custom-control-label" for="checkbox1" >Book</label>
                </div>
            </a>
            <a class="dropdown-item" href="#">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="checkbox2" checked>
                    <label id="click-author" class="custom-control-label" for="checkbox2">Author</label>
                </div>
            </a>
            <a class="dropdown-item" href="#">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="checkbox3" checked>
                    <label id="click-status" class="custom-control-label" for="checkbox3">Status</label>
                </div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="checkbox4" checked>
                    <label class="custom-control-label" for="checkbox4">Check me</label>
                </div>
            </a>
        </div>
        <!-- Basic dropdown -->


        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col" class="book-hide">Book Name</th>
                <th scope="col" class="author-hide">Author</th>
                <th scope="col" class="status-hide">Status</th>
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
                    <tr class="hover-book">
                        <td>{{++$key}}</td>
                        <td class="book-hide">{{$book->book_name}}</td>
                        <td>{{$book->author}}</td>
                        <td>{{$book->status}}</td>
                        <td><a href="{{route('books.edit',$book->id)}}">Edit</a> </td>
                        <td><a href="{{route('books.delete',$book->id)}}">Delete</a> </td>
                    </tr>

                @endforeach
            @endif

            </tbody>
        </table>
{{--        {{$books->links()}}--}}
    </div>


<script type="text/javascript">
    $(document).ready(function (){

        $('.hover-book').hover(function () {
            $(this).css('background-color','#343a40')
            $(this).css('color','white')

        }, function () {
            $(this).css('background-color','white')
            $(this).css('color','black')
        })

        $('#click-book').click(function (){
            $('.book-hide').toggle();
        })

        $('#click-author').click(function (){
            $('.author-hide').toggle();
        })

        $('#click-status').click(function (){
            $('.status-hide').toggle();
        })

        let origin = location.origin

        $('#search').on('keyup',function(){
            $value = $(this).val();
            $.ajax({
                type: 'get',
                url: 'http://127.0.0.0:8000/admin/books/search',
                data: {
                    'search': $value
                },
                success:function(data){
                    $('tbody').html(data);
                }
            });
        })


    })
</script>
@endsection
