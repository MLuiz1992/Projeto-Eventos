<?php

namespace App\Http\Controllers;

use App\Genero;
use App\Filme;
use Session;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //return $genero = Genero::with('filmes')->get();

        //buscar todos os dados
        $generos = Genero::all();

        //repassar para a view
        return view('generos.index', compact('generos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('generos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //cria um novo genero
        $genero = new Genero();
        
        //coloca os dados dentro do genero
        $genero->nome = $request->nome;

        //salva o genero
        $genero->save();
        
        Session::flash('success', "Gênero Criado com Sucesso!");

        //retorna ;D
        return redirect('/generos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function show(Genero $genero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function edit(Genero $genero)
    {
        return view('generos.edit', compact('genero'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Genero $genero)
    {
        $genero->nome = $request->nome;

        $genero->save();

        return redirect('/generos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genero $genero)
    {
        $genero->delete();
        return redirect('/generos');
    }
}
