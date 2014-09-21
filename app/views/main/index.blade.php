@extends('layouts/main')

@section('title')
	Phorrow - Bilder
@stop

@section('content')

	<div class="row">

			@if(!$inventories->count() > 0)
			<p class="album-header-fix">Inga bilder är uppladdade...</p>
		@endif

		@if($inventories->count() == 1)
			@foreach ($inventories as $inventory)
			<div class="col-md-3">
				<p class="album-header">{{ $inventory->title }}</p>
				<a href="{{ URL::to('/albums/' . $inventory->collection['id'] . '/image/' . $inventory->id) }}">
					<img src="{{ URL::asset('uploads/' . $inventory->file_name) }}" class="img-responsive ">
				</a>	
			</div>
			@endforeach
		@endif


@while($t < $inventories->count())
		@foreach ($inventories as $inventory)
			
		

		@if($t%5 == 0)
		<div class="row">
			<div class="col-md-3">
				<p class="album-header">{{ $inventory->title }}</p>
				<a href="{{ URL::to('/albums/' . $inventory->collection['id'] . '/image/' . $inventory->id) }}">
					<img src="{{ URL::asset('uploads/' . $inventory->file_name) }}" class="img-responsive ">
				</a>	
			</div>
		
		@else

		<div class="col-md-3">
				<p class="album-header">{{ $inventory->title }}</p>
				<a href="{{ URL::to('/albums/' . $inventory->collection['id'] . '/image/' . $inventory->id) }}">
					<img src="{{ URL::asset('uploads/' . $inventory->file_name) }}" class="img-responsive ">
				</a>	
		</div>
		@endif
	
		@if($t%4 == 0)

		</div>

		@endif

			
			<?php $t++; ?>
	
		
		@endforeach

@endwhile


			
	</div>



@stop



