<h1>Publicar Mensagem</h1>
<hr>

<form action="/post" method="post">
{{csrf_field() }}

Editor: <select name='editor_id'>
				@foreach($editors as $editor)
					<option value="{{$editor->id}}">{{$editor->name}}</option>
				@endforeach
			</select><br>

Mensagem: <select name='message_id'>
				@foreach($messages as $message)
					<option value="{{$message->id}}">{{$message->title}}</option>
				@endforeach
			</select><br>

<input type="submit" value="Salvar">
</form>