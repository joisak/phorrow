@extends('layouts/main')
@section('title')
	Login my Friend
@stop
@section('content')

{{ Form::open(array('url'=> array('users/signin','$user->id'), 'class'=>'form-signin')) }}
    <h2 class="form-signin-heading">Ange användarnamn och lösenord</h2>
 
    {{ Form::text('email', null, array('class'=>'input-block-level form-control', 'placeholder'=>'Email Address')) }}
    {{ Form::password('password', array('class'=>'input-block-level form-control', 'placeholder'=>'Password')) }}
 
    {{ Form::submit('Logga in', array('class'=>'btn btn-large btn-primary btn-block button-login'))}}
{{ Form::close() }}
@stop