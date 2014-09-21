@section('content')

@if(!Auth::check())
	<p>Get away bitch!</p>
@else


	<h3 class="album-header">{{ $collection->name }}</h3>
	<hr>

	

@foreach ($inventories as $inventory)

	<img src="{{ URL::asset('/uploads/' . $inventory->file_name) }}" width="200" height="auto" alt="">

@endforeach

<div class="row">
	<div class="col-md-12">
		<hr>
		<a href="{{ URL::route('collection.edit', $collection->id) }}" class="btn btn-info">Ändra</a> 
	</div>
</div>


@endif
@stop