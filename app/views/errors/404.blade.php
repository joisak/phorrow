@extends('layouts.error')


<div class="col-xs-12 col-md-12">
	<div class="panel panel-default">
		<div class="panel-body">
			<h1> 404 </h1>
			<h2>Sidan du sökte efter finns inte.</h2>
			<a href ="{{URL::to('/users/login')}}">Gå till startsidan</a>
		</div>
	</div>
</div>

