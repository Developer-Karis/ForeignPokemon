@extends('template.template')

@section('content')
<div class="container mt-5">
    <div class="card ml-5 mb-5 border-dark p-3 px-5" style="width: 25rem;">
        <h1>Infos Pokemon</h1>
        <img src="{{asset('images/'.$show->src)}}" alt="" height="200" width="200">
        <h5 class="mt-5">Nom : {{$show->nom}}</h5>
        @if($show->type->type == null)
        <p>type : sans élément</p>
        @else
        <h5 class="mt-2">Type : {{$show->type->type}}</h5>
        @endif
        <h5 class="mt-2">Niveau : {{$show->niveau}}</h5>

        <div class="d-flex">
            <a href="/edit-pokemon/{{$show->id}}" class="btn btn-primary mt-3 w-25 mr-2">Edit</a>
            <a href="/delete-pokemon/{{$show->id}}" class="btn btn-danger mt-3 w-25">Delete</a>
        </div>
    </div>
</div>
@stop