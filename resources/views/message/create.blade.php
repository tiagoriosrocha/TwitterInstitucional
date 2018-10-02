<h1>Criar Mensagem</h1>
<hr>

<form method="post" action="/message">
{{csrf_field() }}

Editor: <select name='editor_id'>
				@foreach($editors as $editor)
					<option value="{{$editor->id}}">{{$editor->name}}</option>
				@endforeach
			</select><br>
Título <input type="text" name="title"> <br>
Descrição <input type="text" name="description"> <br>
<input type="submit" value="Salvar">
</form>
