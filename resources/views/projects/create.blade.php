@extends('templates.base')

@section('title', 'I&M - Homepage')
@section('content')


<h1 class="text-center">Area di creazione</h1>
<div class="row justify-content-center">
  <div class="col-5">
    <form method="POST" action="{{route('projects.store')}}">
        @csrf
        <div class="row row-gap-2">
            <div class="col-12">
                <label for="name" class="form-label">Nome progetto</label>
                <input type="text" name="name" id="name" class="form-control" required><br>
            </div>

            <div class="col-12">
                <label for="languages">Linguaggio di programmazione</label>
                <input type="text" name="languages" id="languages" class="form-control" required><br>
            </div>
            
            <div class="col-12">
                <label for="year">Giorno</label>
                <input type="datetime-local" name="year" id="year" class="form-control" required><br>
            </div>

            <div class="col-12">
                <label for="image">Immagine</label>
                <input type="text" name="image" id="image" class="form-control"><br>
            </div>

            <label for="description" class="form-label mb-0" required>Descrizione</label>
            <div class="form-floating">
                <textarea class="form-control pt-2" placeholder="Piccola trama" name="description" id="floatingTextarea2" style="height: 100px"></textarea><br>
            </div>

            <div class="col-12 mt-3">
                <input type="submit" value="Aggiungi progetto" class="btn btn-primary">
            </div>
        </div>

    </form>
  </div>
</div>

@endsection