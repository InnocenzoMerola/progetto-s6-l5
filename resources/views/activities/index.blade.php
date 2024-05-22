@extends('templates.base')

@section('title', 'I&M - Homepage')
@section('content')

<h1>Attività</h1>

    @session('created_success')
        <div class="alert alert-success" role="alert">
            Attività "{{session('created_success')->name}}" aggiunta con successo!
        </div>
    @endsession
    @session('updated_success')
        <div class="alert alert-success" role="alert">
            Attività "{{session('updated_success')->name}}" modificata con successo!
        </div>
    @endsession
    @session('deleted_success')
        <div class="alert alert-success" role="alert">
            Attività "{{session('deleted_success')->name}}" eliminata con successo!
        </div>
    @endsession

    @if ($activities->count())
        <table  class="table table-striped border border-2">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Anno</th>
                    @auth
                        <th class="action-th">Azioni</th>
                    @endauth
                </tr>
            </thead>
            <tbody>
                @foreach ( $activities as $activity )
                    <tr class="align-middle">
                        <td>{{$activity->name}}</td>
                        <td>{{$activity->description}}</td>
                        <td>{{$activity->year}}</td>
                        @auth
                            @if (Auth::user()->id === $activity->user_id)
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{route('activities.show', ['id' => $activity->id])}}" class="btn btn-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                                            </svg>
                                        </a>
                                        <a class="btn btn-success text-white text-decoration-none" href="{{route('activities.edit', ['id'=>$activity])}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                                            </svg>
                                        </a>
                                        <form action="{{route('activities.destroy', ['id' => $activity])}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            @else
                                <td>Non hai il permesso</td>
                            @endif
                        @endauth
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$activities->links()}}
        @else
            <h2>Nessuna attività disponibile</h2>
    @endif

@endsection