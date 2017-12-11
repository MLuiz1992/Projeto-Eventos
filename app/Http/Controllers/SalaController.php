<?php

namespace App\Http\Controllers;

use App\Sala;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests\SalaRequest;

class SalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salas = Sala::all();

        return view('salas.index', compact('salas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('salas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SalaRequest $request)
    {
        $this->validate($request, [
            'id' => 'required|unique:salas,ident',
            'nome' => 'required',
        ]);

        $sala = new Sala();

        $sala->ident = $request->id;
        $sala->nome = $request->nome;

        $sala->save();

        Session::flash('success', 'Sala cadastrada com sucesso!');
        
        return redirect()->route('salas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sala  $sala
     * @return \Illuminate\Http\Response
     */
    public function show(Sala $sala)
    {
        $sala = Sala::find($id);

        return view('salas.show', compact('sala'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sala  $sala
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sala = Sala::find($id);

        return view('salas.edit', compact('sala'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sala  $sala
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sala $sala)
    {
        $sala->ident = $request->ident;
        $sala->nome = $request->nome;

        $sala->save();

        Session::flash('success', 'Sala atualizada com sucesso!');

        return redirect()->route('salas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sala  $sala
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sala = Sala::find($id);

        $sala->delete();

        Session::flash('success', 'A Sala foi deletada com Sucesso!');

        return redirect()->route('salas.index');
    }
}
