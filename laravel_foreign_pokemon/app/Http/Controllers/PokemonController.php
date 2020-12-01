<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pokemons = Pokemon::all();
        return view('home', compact('pokemons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        return view('pages.createPokemon', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storePokemon = new Pokemon();
        $storePokemon->nom = $request->nom;
        $storePokemon->type_id = $request->type_id;
        $storePokemon->src = $request->file('photo')->hashName();
        $request->file('photo')->storePublicly('images', 'public');
        $storePokemon->niveau = $request->niveau;
        $storePokemon->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function show(Pokemon $pokemon, $id)
    {
        $show = Pokemon::find($id);
        return view('pages.showPokemon', compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function edit(Pokemon $pokemon, $id)
    {
        $pokemons = Pokemon::all();
        $edit = Pokemon::find($id);
        $types = Type::all();
        return view('pages.editPokemon', compact('edit', 'pokemons', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pokemon $pokemon, $id)
    {
        $update = Pokemon::find($id);
        $update->nom = $request->newName;
        $update->type_id = $request->newType;
        $update->niveau = $request->newLevel;
        $update->save();

        // 2 . Supprimer l'image de base
        Storage::disk('public')->delete('images/' . $update->src);
        // 3 . Modifier le chemin de l'image dans la colonne src par celui de la nouvelle image
        $update->src = $request->file('newPhoto')->hashName();
        $update->save();
        // 4 . Rajouter l'image dans le dossier
        $request->file('newPhoto')->storePublicly('images', 'public');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pokemon $pokemon, $id)
    {
        $newDelete = Pokemon::find($id);
        Storage::disk('public')->delete($newDelete->src);
        $newDelete->delete();
        return redirect('/');
    }
}
