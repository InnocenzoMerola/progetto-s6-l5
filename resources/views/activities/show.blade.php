@extends('templates.base')

@section('title', "$activity->name - I&M")
@section('content')



    <div class="row">
        <h1>{{$activity->name}}</h1>
        <p>Data: {{$activity->year}}</p>
        <p>{{$activity->description}}</p>
    </div>



@endsection