<h1>Editora {{$editor->name}}</h1>
<hr>

<p>Mensagens Enviadas:</p>
<ul>
@foreach($editor->messages as $message)
	<li>{{$message->id}} {{$message->title}} - {{$message->created_at->format('m/d/Y')}}</li>
	<ul>
	@foreach($message->readers as $follower)
		<li>{{$follower->name}}</li>
	@endforeach
	</ul>
@endforeach
</ul>