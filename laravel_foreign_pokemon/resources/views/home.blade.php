@extends('template.template')

@section('content')
<h1 class="text-center mt-5">Pokemons</h1>
<div class="container mt-5">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Type</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($pokemons as $pokemon)
                <th scope="row">{{$pokemon->id}}</th>
                <td>{{$pokemon->nom}}</td>
                <td>{{$pokemon->type->type}}</td>
                <td>
                    <a href="/show-pokemon/{{$pokemon->id}}" class="btn btn-primary">Show</a>
                </td>
                @endforeach
            </tr>
        </tbody>
    </table>
</div>
@stop