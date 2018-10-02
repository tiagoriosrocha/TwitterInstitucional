<?php

namespace App\Http\Controllers;

use App\User;
use App\Editor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function seguir($editor_id){
        $editor = Editor::find($editor_id);
        $editor->followers()->attach(Auth::id());
        return redirect('/listareditores')->with('success', "Seguindo com sucesso o editor $editor->name!!");
    }

    public function pararseguir($editor_id){
        $editor = Editor::find($editor_id);
        $editor->followers()->detach(Auth::id());
        return redirect('/listareditores')->with('success', "Parou de seguir o editor $editor->name!!");
    }

    public function vermensagens($id){
        $user = User::where("id",$id)->with('messages')->get()->first();

        //altera a data de visualização das mensagens
        foreach($user->messages as $msg){
            $msg->pivot->reading_date =  \Carbon\Carbon::now('UTC');
            $msg->pivot->save();
        }


        return view('user.vermensagens',["user" => $user]);
    }

}


