@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">
                    {{-- filtravimas --}}
                    <h2> KNYGOS </h2>
                    <div class="make-inline">
                        <form action="{{route('book.index')}}" method="get" class="make-inline">
                            <div class="form-group make-inline">
                                <label>Autorius: </label>
                                <select class="form-control" name="author_id">
                                    <option value="0" disabled @if($filterBy==0) selected @endif> Pasirinkti autoriu</option>
                                    @foreach ($authors as $author)
                                    <option value="{{$author->id}}" @if($filterBy==$author->id) selected @endif>
                                        {{$author->name}} {{$author->surname}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="form-check-label">Isrusiuoti pagal pavadinima:</label>
                            <label class="form-check-label" for="sortASC">ASC</label>
                            <div class="form-group make-inline column">
                                <input type="radio" class="form-check-input" name="sort" value="asc" id="sortASC" @if($sortBy=='asc' ) checked @endif>
                            </div>
                            <label class="form-check-label" for="sortDESC">DESC</label>
                            <div class="form-group make-inline column">
                                <input type="radio" class="form-check-input" name="sort" value="desc" id="sortDESC" @if($sortBy=='desc' ) checked @endif>
                            </div>
                            <button type="submit" class="btn btn-primary">Filtruoti</button>
                        </form>
                        <a href="{{route('book.index')}}" class="btn btn-info">isvalyti filtra</a>
                    </div>
                </div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($books as $book)
                        <li class="list-group-item list-line">
                            <div class="list-line_books">
                                <div class="list-line_title">
                                    {{$book->title}}
                                </div>
                                <div class="list-line_author">
                                    {{$book->bookAuthor->name}} {{$book->bookAuthor->surname}}
                                </div>
                                <div class="list-line_author">
                                    <b>Leidejas:</b>{{$book->bookPublisher->title}}
                                </div>
                            </div>
                            <div class="list-line_button">
                                <a href="{{route('book.show',[$book])}}" class="btn btn-primary"> RODYTI </a>
                                <a href="{{route('book.edit',[$book])}}" class="btn btn-primary"> KOREGUOTI </a>
                                <a href="{{route('book.pdf',[$book])}}" class="btn btn-info"> PDF </a>
                                {{-- kad atsirastu lentele ar tikrai norite trinti? class=book-delete --}}
                                <form method="POST" data-book-id="{{$book->id}}" class="book-delete" action="{{route('book.destroy', [$book])}}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">ISTRINTI</button>
                                </form>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    @if(!$sortBy)
                    <div class="pagrinator-container">
                        {{$books->onEachSide(2)->links()}}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
