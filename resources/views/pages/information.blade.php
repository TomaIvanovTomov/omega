@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="information-page">
            <div class="row">
                <div class="col-sm-12">
                    <h1>{{$title}}</h1>
                </div>
                <div class="col-sm-12">
                    <p>{{$content}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
