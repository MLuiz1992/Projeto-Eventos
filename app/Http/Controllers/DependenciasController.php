<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Lista;
use App\User;
use Session;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $lista_id)
    {
        $lista = Lista::find($lista_id);

        $comment = new Comment();
        $comment->nota = $request->nota;
        $media = collect([$request->nota])->avg('nota');
        $comment->comment = $request->comment;
        $comment->user_id = $request->user_id;
        $comment->lista()->associate($lista);

        $comment->save();

        Session::flash('success', 'Avaliação feita com sucesso');

        return redirect()->route('listas.show', [$lista->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);
        return view('comments.edit')->withComment($comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);
        $comment->nota = $request->nota;
        $comment->comment = $request->comment;
        $comment->save();
        Session::flash('success', 'Comentário Atualizado com Sucesso!');
        return redirect()->route('listas.show', $comment->lista->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $lista_id = $comment->lista->id;
        $comment->delete();
        Session::flash('success', 'Comentário deletado com sucesso');
        return redirect()->route('listas.show', $lista_id);
    }
}
