@section('title')
	Ändra
@stop
@section('content')
@section('content')
@if(!Auth::check())
	<p>Get away bitch!</p>
@else


{{ Form::model($inventory, array('route' => array('inventory.update', $inventory->id), 'method' => 'PUT', 'class' => 'form-signin')) }}

	
	{{ Form::label('title', 'Bild namn')}}
	
	{{ Form::text('title', $inventory->title, array('class' => 'form-control')) }}

	{{ Form::label('description', 'Beskrivning')}}

	{{ Form::text('description', $inventory->description , array('class' => 'form-control')) }}

	{{ Form::label('collection', 'Album')}}

	{{ Form::select('collection', $collections, $inventory->id , array('class' => 'form-control')) }}

	{{Form::submit('Uppdatera bilden', array('class' => 'btn-success form-control')) }}

{{ Form::close() }}

@endif
@stop