@extends('templates.base')

@section('title', "$project->name - I&M")
@section('content')



<div class="row">
    <div class="col-4 offset-2">
        <img src="{{$project->image}}" alt="{{$project->name}}" width="100%" >
    </div>
    <div class="col-4">
        <h1>{{$project->name}}</h1>
        <p>Data: {{$project->year}}</p>
        <p>{{$project->description}}</p>
        <div class="d-flex justify-content-end">
            <span class="badge text-bg-secondary">{{$project->languages}}</span>
        </div>
    </div>
</div>



@endsection