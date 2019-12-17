@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <ul>
                    <h2>{{ $book->title }} ({{$book->isbn}})</h2>
                    <p>{{$book->description}}</p>
                    <a href="{{$book->id}}/edit">edit</a><br>

                    <form action="/books/{{$book->id}}" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button type="submit" name="Button" >Delete</button><br>
                    </form>
                </ul>
            </div>
        </div>
    </div>
@endsection
