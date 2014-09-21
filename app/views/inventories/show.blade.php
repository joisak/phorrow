@section('title')
	Cool Bild
@stop
@section('content')


@if(!Auth::check())
	<p>Get away bitch!</p>
@else

	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
		<p>{{ $inventory->title }}</p>
		<img src="{{ URL::asset('/uploads/' . $inventory->file_name) }}" class="img-responsive">
		<p>Notering: {{ $inventory->description }}</p>

			
		
			





		<a href="{{ URL::route('inventory.edit', $inventory->id) }}" class="btn btn-info btn-edit">Ändra</a>
		
		{{ Form::model($inventory, array('route' => array('inventory.destroy', $inventory->id), 'method' => 'DELETE')) }}
			{{ Form::submit('Ta bort bild', array('class' => 'btn btn-danger')) }}
		{{ Form::close() }}


	@endif
	</div>
	</div>
@stop