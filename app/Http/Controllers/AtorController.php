<?php

namespace App\Http\Controllers;

use App\Ator;
use Illuminate\Http\Request;

class AtorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $atores = Ator::all();
        return view('atores.index', compact('atores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('atores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ator = new Ator();
        $ator->Nome = $request->nome;
        $ator->Ano = $request->ano;

        $ator->save();

        return redirect('/atores');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ator  $ator
     * @return \Illuminate\Http\Response
     */
    public function show(Ator $ator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ator  $ator
     * @return \Illuminate\Http\Response
     */
    public function edit(Ator $atore)
    {
        //busca no banco o ator
        
        return view('atores.edit', compact('atore'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ator  $ator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ator $atore)
    {
        $atore->Nome = $request->nome;
        $atore->Ano = $request->ano;

        $atore->save();

        return redirect('/atores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ator  $ator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ator $atore)
    {
        $atore->delete();
        return redirect('/atores');
        
    }
}
