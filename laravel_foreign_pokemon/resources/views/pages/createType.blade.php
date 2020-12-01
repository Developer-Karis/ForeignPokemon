@extends('template.template')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-6">
            <form action="{{route('storeType')}}" method="post">
                @csrf
                <div class="card ml-5 mb-5 border-dark p-3 px-5" style="width: 25rem;">
                    <h1 class="text-center mb-4">Créer un Type</h1>

                    <label for="" class="mt-3">Type : </label>
                    <input type="text" name="monType" class="w-75">

                    <button class="btn btn-primary mt-4 w-25">Créer</button>
                </div>
            </form>
        </div>
        <div class="col-6">
            <h1 class="text-center mb-5">Types</h1>
            @foreach ($types as $item)
            <div class="d-flex">
                <h5 class="mt-2">{{$item->type}}</h5>
                <a href="/delete-type/{{$item->id}}" class="btn btn-danger ml-3 mb-4">Delete</a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@stop