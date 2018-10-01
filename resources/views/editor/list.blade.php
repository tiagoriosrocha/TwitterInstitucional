  
<h1>Lista de Editores</h1>

<hr>

<!-- EXIBE MENSAGENS DE SUCESSO -->
  @if(\Session::has('success'))
	<div class="container">
  		<div class="alert alert-success">
    		{{\Session::get('success')}}
  		</div>
  	</div>
  @endif

  <!-- EXIBE MENSAGENS DE ERROS -->
  @if ($errors->any())
  <div class="container">
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  </div>
  @endif

@foreach($editors as $editor)
	<p>{{$editor->name}} &emsp;

    @auth
        @if( $editor->followers->where('id',Auth::user()->id)->count() == 0 )
          <a href='/seguir/{{$editor->id}}'>seguir</a></p>
        @else
          <a href='/pararseguir/{{$editor->id}}'>parar de seguir</a></p>
        @endif
    @endauth

@endforeach

