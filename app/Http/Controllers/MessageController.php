<?php

namespace App\Http\Controllers;

use App\Message;
use App\Editor;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Validator;

class MessageController extends Controller
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
        $editors = Editor::all();
        return view('message.create',['editors' => $editors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //faço as validações dos campos
        
        //vetor com as mensagens de erro
        $messages = array(
            'title.required' => 'É obrigatório um título para a mensagem',
            'description.required' => 'É obrigatória uma descrição para a mensagem',
        );
        
        //vetor com as especificações de validações
        $regras = array(
            'title' => 'required|string|max:255',
            'description' => 'required',
        );
        
        //cria o objeto com as regras de validação
        $validador = Validator::make($request->all(), $regras, $messages);
        
        //executa as validações
        if ($validador->fails()) {
            return redirect('/criarmensagem')
            ->withErrors($validador)
            ->withInput($request->all);
        }
        //se passou pelas validações, processa e salva no banco...
        $obj_Mensagem = new Message();
        $obj_Mensagem->title =       $request['title'];
        $obj_Mensagem->description = $request['description'];
        $obj_Mensagem->editor_id =   $request['editor_id'];
        $obj_Mensagem->save();
        
        return redirect("/message/$obj_Mensagem->id")->with('success', 'Mensagem criada com sucesso!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $msg = Message::find($id);
        return view('message.show',['message' => $msg]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }

    public function createpublicar(){
        $editors = Editor::all();
        $messages = Message::all();
        return view('message.enviar',['editors' => $editors, 'messages' => $messages]);
    }

    public function post(Request $request){
        $editor = Editor::find($request['editor_id']);
        $message = Message::find($request['message_id']);

        foreach($editor->followers as $follower){
            //$message->attach($follower->id);
            $follower->messages()->attach($message->id, array('reading_date' => \Carbon\Carbon::now('UTC')));
        }

        return redirect("/listarmensagensenviadas/$editor->id")->with('success', 'Mensagens postadas!!');
    }
}
