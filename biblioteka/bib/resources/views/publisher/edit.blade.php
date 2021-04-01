@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Koreguoti leideja</div>

                <div class="card-body">
                    <form method="POST" action="{{route('publisher.update',[$publisher->id])}}">
                        <div class="form-group">
                            <label>Title: </label>
                            <input type="text" class="form-control" name="publisher_title" value="{{old('publisher_title', $publisher->title)}}">
                            <small class="form-text text-muted">Pakeisti Leidejo pavadinima.</small>
                        </div>
                        @csrf
                        <button type="submit" class="btn btn-primary">EDIT</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
