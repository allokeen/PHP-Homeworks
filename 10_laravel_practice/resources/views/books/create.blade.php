@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>New book:</h2>
                <form action={{route("books.store")}} method="post">
                {{csrf_field()}}

                    <button type="submit" name="Button" >Create</button><br>

                <input name="isbn" type="text" value={{old('isbn')}}><br>
                <input name="title" type="text" value={{old('title')}}><br>
                <input name="description" type="text" value={{old('description')}}><br>


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
