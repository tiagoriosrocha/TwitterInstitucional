<?php

namespace App\Http\Controllers;

use App\Editor;
use Illuminate\Http\Request;

class EditorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //retorna todas as atividades
        $editors = Editor::orderBy('name', 'asc')
            ->with(['followers'])
            ->paginate(20);
        
        return view('editor.list',['editors' => $editors]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Editor  $editor
     * @return \Illuminate\Http\Response
     */
    public function show(Editor $editor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Editor  $editor
     * @return \Illuminate\Http\Response
     */
    public function edit(Editor $editor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Editor  $editor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Editor $editor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Editor  $editor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Editor $editor)
    {
        //
    }

    public function seguidores($id)
    {
        $editor = Editor::where('id',$id)
        ->with(['followers'])
        ->get()
        ->first();

        return view('editor.showfollowers',compact('editor'));
    }

    public function mensagens($id)
    {
        $editor = Editor::where('id',$id)
        ->with(['messages','messages.readers'])
        ->orderBy('created_at', 'desc')
        ->get()
        ->first();

        return view('editor.showmessages',compact('editor'));
    }

}
