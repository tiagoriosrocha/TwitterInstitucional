<h1>Editora {{$editor->name}}</h1>
<hr>

<p>Seguidores:</p>
<ul>
@foreach($editor->followers as $followers)
	<li>{{$followers->name}}</li>
@endforeach
</ul>