@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2> KNYGA {{$book->title}}</h2>
                    <div class="card-body">
                        {{-- kad rodytu vaizda reik !! --}}
                        {!!$book -> about!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
