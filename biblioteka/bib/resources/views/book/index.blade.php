@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2> KNYGOS </h2>
                    <div class="make-inline">
                        <form action="{{route('book.index')}}" method="get" class="make-inline">
                            <div class="form-group" class="make-inline">
                                <label>Autorius: </label>
                                <select class="form-control" name="author_id">
                                    <option value="0" disabled @if($filterBy==0) selected @endif> Pasirinkti autoriu</option>
                                    @foreach ($authors as $author)
                                    <option value="{{$author->id}}" @if($filterBy==$author->id) selected @endif>
                                        {{$author->name}} {{$author->surname}}
                                    </option>
                                    @endforeach
                                </select>
                                <small class="form-text text-muted">Pasirinkti Autoriaus varda.</small>
                            </div>
                            <button type="submit" class="btn btn-primary">Filtruoti</button>
                            <div class="form-group" class="make-inline">
                                <input </div>
                        </form>
                        <a href="{{route('book.index')}}" class="btn btn-info">isvalyti filtra</a>
                    </div>
                </div>

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
