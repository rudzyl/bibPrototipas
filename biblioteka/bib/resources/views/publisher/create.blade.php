@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Create new Publisher

                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('publisher.store')}}">
                        <div class="form-group">
                            <label>Title: </label>
                            <input type="text" class="form-control" name="publisher_title" value="{{old('publisher_title')}}">
                            <small class="form-text text-muted">Irasyti nauja Leidejo pavadinima.</small>
                        </div>

                        @csrf
                        <button type="submit" class="btn btn-primary">ADD</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
