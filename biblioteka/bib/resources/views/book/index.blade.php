@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">KNYGOS</div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($books as $book)
                        <li class="list-group-item list-line">
                            <div class="list-line_books">
                                {{$book->title}}
                            </div>
                            <div class="list-line_name">
                                {{$book->bookAuthor->name}} {{$book->bookAuthor->surname}}
                            </div>
                            <div class="list-line_button">
                                <a href="{{route('book.edit',[$book])}}" class="btn btn-primary"> KOREGUOTI </a>
                                <form method="POST" action="{{route('book.destroy', [$book])}}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">ISTRINTI</button>
                                </form>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
