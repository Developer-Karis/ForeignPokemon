@extends('template.template')

@section('content')
<div class="container mt-5">
    <form action="/update-pokemon/{{$edit->id}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card ml-5 mb-5 border-dark p-3 px-5" style="width: 28rem;">
            <h1>Modifier un Pokemon</h1>

            <label for="" class="mt-4">Nom : </label>
            <input type="text" name="newName" value="{{$edit->nom}}" class="w-50">

            <label for="" class="mt-4">Type : </label>
            <select name="newType" class="w-50">
                @foreach ($types as $item)
                <option value="{{$item->id}}">{{$item->type}}</option>
                @endforeach
            </select>

            <label for="" class="mt-4">Changer l'image : </label>
            <input type="file" name="newPhoto">

            <label for="" class="mt-4">Niveau : </label>
            <input type="number" name="newLevel" value="{{$edit->niveau}}" class="w-50" min="1" max="100">

            <button class="btn btn-primary mt-4 w-25">Update</button>
        </div>
    </form>
</div>
@stop