@section('title')
	Ladda upp en bild
@stop
@section('content')

@if(!Auth::check())
	<p>Get away bitch!</p>
@else

	@if(!$collections > 0)
		<h2 class="album-header" style="text-align: center">Skapa ett album innan du laddar upp bilder!</h2>
	@else

{{ Form::open(array('route' => 'inventory.store', 'files' => 'true','class' => 'form-signin')) }}

	{{ Form::label('title', 'Bildens namn')}}
	
	{{ Form::text('title', null, array('class' => 'form-control')) }}

	{{ Form::label('image', 'Bild')}}

	{{ Form::file('image', array('class' => 'form-control')) }}

	{{ Form::label('description', 'Beskrivning')}}

	{{ Form::text('description', null, array('class' => 'form-control')) }}

	{{ Form::hidden('users_id', Auth::user()->id) }}

	{{ Form::label('collection', 'Album')}}

	{{ Form::select('collection' , $collections) }} 


	{{Form::submit('Ladda upp bilden', array('class' => 'form-control btn-success')) }}
	@endif

{{ Form::close() }}

@endif
@stop