{{-- @foreach ($books as $book)
{{$book->title}}{{$book->author_id}}<a href="{{route('book.edit',[$book])}}">EDIT</a>
<form method="POST" action="{{route('book.destroy', [$book])}}">
    @csrf
    <button type="submit">DELETE</button>
</form>
<br>
@endforeach --}}

@foreach ($books as $book)
{{$book->title}} {{$book->bookAuthor->name}} {{$book->bookAuthor->surname}}<a href="{{route('book.edit',[$book])}}">EDIT</a>
<form method="POST" action="{{route('book.destroy', [$book])}}">
    @csrf
    <button type="submit">DELETE</button>
</form>
<br>
@endforeach
