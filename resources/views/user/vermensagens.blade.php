<h1>Timeline do {{ Auth::user()->name }}</h1>
<hr>

@foreach( $user->messages as $msg )
	
		<p>
		   {{ $msg->id }} - 
		   {{ $msg->title }} - 
		   {{ $msg->created_at->format('m/d/Y') }} - 
		   {{ $msg->pivot->reading_date->format('m/d/Y') }}
		</p>
	
@endforeach
