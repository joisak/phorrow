@extends('layouts/main')

@section('title')
	Phorrow - Album
@stop

@section('content')

	<div class="row">
		<div class="container">
		

			
			<h2 class="album-header-fix">Bilder från albumet <span class="album-header">{{ $albums->name }}</span></h2>
				
				
			@foreach( $albums->inventory as $img)
				<div class="col-md-3 img-block">
				
					<a href="{{ URL::to('/albums/' . $albums->id . '/image/' . $img->id) }}">
						<p><img src="{{ URL::asset('uploads/' . $img->file_name)}}" class="img-responsive"></p>
					</a>
				</div>

	@endforeach
		</div>
	</div>

@stop