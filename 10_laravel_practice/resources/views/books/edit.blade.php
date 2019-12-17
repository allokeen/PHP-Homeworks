@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Edit book:</h2>
                <form action="/books/{{$book->id}}" method="post">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <button type="submit" name="Button" >Update</button><br>

                    <input name="isbn" type="text" value={{$book->isbn}}>
                    <br>
                    <input name="title" type="text" value={{$book->title}}>
                    <br>
                    <input name="description" type="text" value={{$book->description}}>
                    <br>

                </form>
                @if ($errors->any())
                    <div>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
