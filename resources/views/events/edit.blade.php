@extends('layouts.main')

@section('title', 'Editando:'.$event->title)

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Editando: {{$event->title}}</h1>
    <form action="/events/update/{{$event->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Evento:</label>
            <input type="text" class="form-control" id="title" name="title"  value="{{$event->title}}"  placeholder="Digite o nome do evento">
        </div>
        <div class="form-group">
            <label for="date">Data do Evento:</label>
            <input type="date" class="form-control" id="date" name="date" value="{{$event->date->format('Y-m-d')}}">
        </div>
        <div class="form-group">
            <label for="image">Imagem:</label>
            <input type="file" id="image" name="image" class="form-control" onchange="loadFile(event)">
            <img class="img-preview" src="/{{$event->image}}" id="imgPreview" alt="image preview">
        </div>
        <div class="form-group">
            <label for="city">Cidade:</label>
            <input type="text" class="form-control" id="city" name="city" value="{{$event->city}}" placeholder="Digite o nome da cidade onde ocorrerá o evento">
        </div>
        <div class="form-group">
            <label for="private">O evento é privado?</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="private" id="flexRadioDefault1" {{ ($event->private == "0")? "checked" : "" }} value="0">
                <label class="form-check-label" for="flexRadioDefault1">Não</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="private" id="flexRadioDefault2" {{ ($event->private == "1")? "checked" : "" }} value="1">
                <label class="form-check-label" for="flexRadioDefault2">Sim</label>
            </div>
        </div>
        <div class="form-group">
            <label for="title">Adicione itens de infraestrutura:</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="items[]" value="Cadeiras" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">Cadeiras</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="items[]" value="Palco" id="flexCheckChecked">
                <label class="form-check-label" for="flexCheckChecked">Palco</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="items[]" value="Open food" id="flexCheckChecked">
                <label class="form-check-label" for="flexCheckChecked">Open food</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="items[]" value="Brindes" id="flexCheckChecked">
                <label class="form-check-label" for="flexCheckChecked">Brindes</label>
            </div>
        </div>
        <div class="form-group">
            <label for="description">Descrição:</label>
            <textarea class="form-control" id="description" name="description" placeholder="Digite o que vai acontecer no evento..." rows="3">{{$event->description}}</textarea>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary mb-3" value="Cadastrar">
        </div>
    </form>
</div>
@endsection
@push('custom-scripts')
    <script type="text/javascript" src="{{ URL::asset ('js/scripts.js') }}"></script>
@endpush
