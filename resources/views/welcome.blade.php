@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')

<div id="search-container" class="col-md-12">
    <h1>Busque um Evento</h1>
    <form action="/" method="GET">
    <div class="input-group mb-3">
        <span class="input-group-text"><ion-icon name="search-outline"></ion-icon></span>
        <input type="text" id="search" name="search" class="form-control" placeholder="Digite o nome do evento" aria-label="Recipient's username" aria-describedby="button-addon2">
        <input type="submit" class="btn btn-primary" value="Buscar">
    </div>
    </form>
</div>
<div id="events-container" class="col-md-12">
    @if($search)
        <h2>Resultado da busca por {{$search}}</h2>
    @else
        <h2>Próximos Eventos</h2>
        <p class="subtitle">Veja os eventos dos próximos dias</p>
    @endif
    <div id="cards-container" class="row">
        @foreach($events as $event)
            <div class="col-md-3">
                <div class="card" style="width: 18rem;">
                    <img src="{{$event->image}}" width="18rem" class="card-img-top" alt="{{ $event-> title }}">
                    <div class="card-body">
                        <p class="card-date">{{date('d/m/y',strtotime($event->date))}}</p>
                        <h5 class="card-title">{{ $event-> title }}</h5>
                        @if(count($events) > 0)
                            @if(count($event->users) > 1)
                                <p class="card-text">{{count($event->users)}} - participantes</p>
                            @elseif(count($event->users) == 1)
                                <p class="card-text">{{count($event->users)}} - participante</p>
                            @elseif(count($event->users) == 0)
                            <p class="card-text">Ninguém se inscreveu ainda</p>
                            @endif
                        @endif
                        <a href="/events/{{$event->id}}" class="btn btn-primary">Saber mais</a>
                    </div>
                </div>
            </div>
        @endforeach
        @if(count($events) == 0 && $search)
        <div class="row">
        <div class="alert alert-info" role="alert">
                Nenhum evento com o nome {{$search}} foi encontrado !!!
                <p><a href="/" class="alert-link"><< Voltar para Dashboard</a></p>
            </div>
        </div>
        @elseif(count($events) == 0)
            <div class="alert alert-info" role="alert">
                Nenhum evento disponível !!!
            </div>
        @endif
    </div>
</div>


@endsection
