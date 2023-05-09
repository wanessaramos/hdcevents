@extends('layouts.main')

@section('title', $event->title)

@section('content')
    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="image-container" class="col-md-6">
                <img src="/{{$event->image}}" width="200rem"  class="image-fluid" alt="imagem do evento {{$event->title}}">
            </div>
            <div id="info-container"class="col-md-6">
                <h1>{{$event->title}}</h1>
                <p class="event-city"><ion-icon name="location-outline"></ion-icon>{{$event->city}}</p>
                <p class="event-participants"><ion-icon name="people-outline"></ion-icon>{{count($event->users)}}</p>
                <p class="event-owner"><ion-icon name="star-outline"></ion-icon>{{$eventOwner['name']}}</p>
                @if(!$hasUserJoined && ($event->user_id != $user))
                <form action="/events/join/{{$event->id}}" method='POST'>
                    @csrf
                    <a href="http://" class="btn btn-primary"
                    id="event-submit"
                    onclick="event.preventDefault();
                    this.closest('form').submit();"
                    >Confirmar presença</a>
                </form>
                @elseif($event->user_id == $user)
                <p class="already-joined-msg">Você é dono deste evento,
                     <a href="/events/edit/{{$event->id}}">Click aqui para edita-lo!</a></p>
                @else
                    <p class="already-joined-msg">Você já está participando desse evento!</p>
                @endif
                <h3>O Evento conta com:</h3>
                <ul class="list-group list-group-flush">
                    @foreach($event->items as $item)
                        <li class="list-group-item"><ion-icon name="checkmark-circle-outline"></ion-icon><span>{{$item}}</span></li>
                    @endforeach
                </ul>
            </div>
            <div class="co-md-12" id="description-container">
                <h3>Sobre o Evento:</h3>
                <p class="event-description">{{$event->description}}</p>
            </div>
        </div>
    </div>
@endsection
