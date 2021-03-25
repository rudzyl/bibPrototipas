@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">PAVADINIMAS</div>
                <div class="card-body">
                    @foreach ($books as $book)
                    {{$book->title}} {{$book->bookAuthor->name}} {{$book->bookAuthor->surname}}<a href="{{route('book.edit',[$book])}}">EDIT</a>
                    <form method="POST" action="{{route('book.destroy', [$book])}}">
                        @csrf
                        <button type="submit">DELETE</button>
                    </form>
                    <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
