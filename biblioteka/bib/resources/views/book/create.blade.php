@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Prideti nauja knyga</div>

                <div class="card-body">
                    <form method="POST" action="{{route('book.store')}}">

                        <div class="form-group">
                            <label>Pavadinimas: </label>
                            <input type="text" class="form-control" name="book_title">
                            <small class="form-text text-muted">Naujos knygos pavadinimas.</small>
                        </div>
                        <div class="form-group">
                            <label>ISBN: </label>
                            <input type="text" class="form-control" name="book_isbn">
                            <small class="form-text text-muted">Kodas.</small>
                        </div>
                        <div class="form-group">
                            <label>Puslapiai: </label>
                            <input type="text" class="form-control" name="book_pages">
                            <small class="form-text text-muted">Puslapiu skaicius.</small>
                        </div>

                        <div class="form-group">
                            <label>Apie knyga: </label>
                            <textarea id="summernote" name="book_about"></textarea>
                            <small class="form-text text-muted">Apie ka knyga.</small>
                        </div>

                        <div class="form-group">
                            <label>Autorius: </label>
                            <select name="author_id">
                                @foreach ($authors as $author)
                                <option value="{{$author->id}}">{{$author->name}} {{$author->surname}}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Pasirinkti Autoriaus varda.</small>
                        </div>
                        <div class="form-group">
                            <label>Leidykla: </label>
                            <select name="publisher_id">
                                @foreach ($publishers as $publisher)
                                <option value="{{$publisher->id}}">{{$publisher->title}}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Pasirinkti Leidyklos pavadinima.</small>
                        </div>
                        @csrf
                        <button type="submit" class="btn btn-primary">Prideti</button>
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
