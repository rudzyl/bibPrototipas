@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Koreguoti] knyga</div>

                <div class="card-body">
                    <form method="POST" action="{{route('book.update',[$book])}}">

                        <div class="form-group">
                            <label>Pavadinimas: </label>
                            <input type="text" class="form-control" name="book_title" value="{{$book->title}}">
                            <small class="form-text text-muted">Knygos pavadinimas.</small>
                        </div>
                        <div class="form-group">
                            <label>ISBN: </label>
                            <input type="text" class="form-control" name="book_isbn" value="{{$book->isbn}}">
                            <small class="form-text text-muted">Kodas.</small>
                        </div>
                        <div class="form-group">
                            <label>Puslapiai: </label>
                            <input type="text" class="form-control" name="book_pages" value="{{$book->pages}}">
                            <small class="form-text text-muted">Puslapiu skaicius.</small>
                        </div>

                        <div class="form-group">
                            <label>Apie knyga: </label>
                            <textarea id="summernote" name="book_about">{{$book->about}}</textarea>
                            <small class="form-text text-muted">Pakeiskite aprasyma.</small>
                        </div>

                        <div class="form-group">
                            <label>Autorius: </label>
                            <select name="author_id">
                                @foreach ($authors as $author)
                                <option value="{{$author->id}}" @if($author->id == $book->author_id) selected @endif>
                                    {{$author->name}} {{$author->surname}}
                                </option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Pasirinkti Autoriaus varda.</small>
                        </div>
                        <div class="form-group">
                            <label>Leidykla: </label>
                            <select name="publisher_id">
                                @foreach ($publishers as $publisher)
                                <option value="{{$publisher->id}}" @if($publisher->id == $book->publisher_id) selected @endif>
                                    {{$publisher->title}}
                                </option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Pasirinkti Ledejo pavadinima.</small>
                        </div>

                        @csrf
                        <button type="submit" class="btn btn-primary">Koreguoti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });

</script>
@endsection
