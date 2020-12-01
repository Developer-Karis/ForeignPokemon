@extends('template.template')

@section('content')
<div class="container mt-5">
    <form action="{{route('storePokemon')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card ml-5 mb-5 border-dark p-3 px-5" style="width: 25rem;">
            <h1 class="text-center mb-4">Créer un Pokémon</h1>
            <label for="">Nom : </label>
            <input type="text" name="nom">

            <label for="" class="mt-3">Type : </label>
            <select name="type_id" class="w-50">
                @foreach ($types as $item)
                <option value="{{$item->id}}">{{$item->type}}</option>
                @endforeach
            </select>

            <label for="" class="mt-4">Ajoutez une Photo : </label>
            <input type="file" name="photo">

            <label for="" class="mt-4">Niveau : </label>
            <input type="number" name="niveau" min="1" max="100" class="w-25">

            <button class="btn btn-primary mt-4 w-25">Créer</button>
        </div>
    </form>
</div>
@stop