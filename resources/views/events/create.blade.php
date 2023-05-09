@extends('layouts.main')

@section('title', 'Criar Evento')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Crie seu evento</h1>
    <form action="/events" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Evento:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Digite o nome do evento">
        </div>
        <div class="form-group">
            <label for="date">Data do Evento:</label>
            <input type="date" class="form-control" id="date" name="date">
        </div>
        <div class="form-group">
            <label for="image">Imagem:</label>
            <input type="file" id="image" name="image" class="form-control" onchange="loadFile(event)">
            <img class="img-preview" id="imgPreview" alt="image preview">
        </div>
        <div class="form-group">
            <label for="city">Cidade:</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Digite o nome da cidade onde ocorrerá o evento">
        </div>
        <div class="form-group">
            <label for="private">O evento é privado?</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="private" id="flexRadioDefault1" value="0">
                <label class="form-check-label" for="flexRadioDefault1">Não</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="private" id="flexRadioDefault2" value="1" checked>
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
            <textarea class="form-control" id="description" name="description" placeholder="Digite o que vai acontecer no evento..." rows="3"></textarea>
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
