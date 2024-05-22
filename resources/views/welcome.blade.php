@extends('templates.base')

@section('title', 'I&M - Homepage')
@section('content')


  <h1 class="text-center mb-5">I&M</h1>
  @auth
    <h2>Ciao <span class="fw-bold">{{Auth::user()->name}}</span> e bentornato sul nostro sito </h2>
  @endauth
  @guest
    <h2>Benvenuto sul nostro sito</h2>
  @endguest

  <div id="carouselExample" class="carousel slide mt-5">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="https://img.freepik.com/free-vector/landing-page-concept-with-geometric-shapes_52683-22623.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="https://img.freepik.com/free-vector/landing-page-concept-with-geometric-shapes_52683-22667.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="https://img.freepik.com/free-vector/landing-page-concept-with-geometric-shapes_52683-22728.jpg" class="d-block w-100" alt="...">
          </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
      </button>
  </div>


  <div class="row my-5 div-img-home">
    <h2 class="mb-5">Alcuni dei nostri progetti più famosi</h2>
      <div class="col-4">
          <div class="card">
              <img src="https://hd2.tudocdn.net/815221?w=646&h=284" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Netflix</h5>
                <p class="card-text">Creare un sito partendo dal mockup del celebe sito di streaming online</p>
              </div>
          </div>
      </div>
      <div class="col-4">
          <div class="card">
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQSq5bzBSykcjYD7QCfin81BkQdpcWTDH4TJdFnEiVwMg&s" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Spotify</h5>
                <p class="card-text">Creazione di un sito vetrina, utilizzando l'app di streaming musicale come esempio</p>
              </div>
          </div>
      </div>
      <div class="col-4">
          <div class="card">
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTttC4fVgOJ0Jvf5zW4TmRxPOkqifIULZzT_5IUhEyEgjg6BwomqKZ2_WEuPtJA9cxxRy0&usqp=CAU" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Meteo</h5>
                <p class="card-text">Creazione di una pagina capace di mostrare le info metereologiche dei prossimi 15 giorni</p>
              </div>
          </div>
      </div>
  </div>

@endsection