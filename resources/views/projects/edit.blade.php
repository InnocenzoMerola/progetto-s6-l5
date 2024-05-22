@extends('templates.base')

@section('title', 'I&M - Homepage')
@section('content')

<h1 class="text-center">Area di modifica</h1>
<div class="row justify-content-center">
  <div class="col-5">
    <form method="POST" action="{{route('projects.update', ['id' => $project])}}">
        @csrf
        @method('PUT')
        <div class="row row-gap-2">
            <div class="col-12">
                <label for="name" class="form-label">Nome progetto</label>
                <input type="text" name="name" id="name" value="{{$project->name}}" class="form-control" required><br>
            </div>

            <div class="col-12">
                <label for="languages">Linguaggio di programmazione</label>
                <input type="text" name="languages" id="languages" value="{{$project->languages}}" class="form-control" required><br>
            </div>
            
            <div class="col-12">
                <label for="year">Giorno</label>
                <input type="datetime-local" name="year" id="year" value="{{$project->year}}" class="form-control" required><br>
            </div>

            <div class="col-12">
                <label for="image">Immagine</label>
                <input type="text" name="image" id="image" value="{{$project->image}}" class="form-control"><br>
            </div>

            <label for="description" class="form-label mb-0">Descrizione</label>
            <div class="form-floating">
                <textarea class="form-control pt-2" placeholder="Piccola trama" name="description" id="floatingTextarea2" required style="height: 100px">{{$project->description}}</textarea><br>
            </div>

            <div class="col-12 mt-3">
                <input type="submit" value="Modifica progetto" class="btn btn-primary">
            </div>
        </div>

    </form>
  </div>
</div>

@endsection