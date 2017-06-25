<?php

namespace App\Http\Controllers;

use App\Evento;
use App\Sala;
use App\User;
use App\Solicitante;
use Illuminate\Http\Request;
use Session;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salas = Sala::all();
        $eventos = Evento::with('user', 'salas')->orderBy('data')->get();
        return view('eventos.index', compact('eventos', 'salas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $solicitantes = Solicitante::all();
        $salas = Sala::all();
        return view('eventos.create', compact('users', 'salas', 'solicitantes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    
        //cria uma lista
        $evento = new Evento();
        //pega os dados da lista
        $evento->solicitante_id = $request->solicitante_id;
        $evento->nome = $request->nome;
        $evento->data = $request->data;
        $evento->inicio = $request->inicio;
        $evento->termino = $request->termino;
        $evento->user_id = $request->user_id;
        $evento->datashow = $request->datashow;
        $evento->som = $request->som;
        $evento->microfones = $request->microfones;
        $evento->observacoes = $request->observacoes;
        //salva os dados
        $evento->save();
        //retorna ;D
        $evento->salas()->sync($request->salas, false);
        Session::flash('success', 'A lista foi criada com sucesso!');
        return redirect()->route('eventos.index', $evento->id);

    }

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evento = Evento::find($id);
        $aux = Evento::all();
        $events = Evento::all()->where('id', $evento->id);
        return view('eventos.show')->withEvento($evento)->withEvents($events);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function edit(Evento $evento)
    {
        // find the post in the database and save as a var
        $eventos = Evento::find($evento);
        $salas = Sala::all();
        $salas2 = array();
        foreach ($salas as $sala) {
            $salas2[$sala->id] = $sala->nome;
        }
        // return the view and pass in the var we previously created
        return view('eventos.edit')->withEvento($evento)->withSalas($salas2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
                // Validate the data
        $evento = Evento::find($id);
        
        $evento->nome = $request->nome;
        $evento->data = $request->data;
        $evento->inicio = $request->inicio;
        $evento->termino = $request->termino;
        $evento->user_id = $request->user_id;
        $evento->datashow = $request->datashow;
        $evento->som = $request->som;
        $evento->microfones = $request->microfones;
        $evento->observacoes = $request->observacoes;
        //salva os dados
        $evento->save();
        $evento->salas()->sync($request->salas, false);
        Session::flash('success', 'A lista foi criada com sucesso!');
        return redirect()->route('eventos.index', $evento->id);


        
        Session::flash('success', 'A lista foi atualizada com sucesso!');

        return redirect()->route('eventos.show', $lista->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $evento = Evento::find($id);
        $evento->salas()->detach();
        $evento->delete();

        Session::flash('success', 'O evento foi cancelado com sucesso.');
        return redirect()->route('eventos.index');

    }


}
