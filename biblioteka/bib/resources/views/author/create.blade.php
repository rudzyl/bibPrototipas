@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Create new author

                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('author.store')}}">
                        <div class="form-group">
                            <label>Name: </label>
                            <input type="text" class="form-control" name="author_name" value="{{old('author_name')}}">
                            <small class="form-text text-muted">Irasyti nauja Autorio varda.</small>
                        </div>
                        <div class="form-group">
                            <label>Surname: </label>
                            <input type="text" class="form-control" name="author_surname" value="{{old('author_surname')}}">
                            <small class="form-text text-muted">Irasyti nauja Autorio pavarde.</small>
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
