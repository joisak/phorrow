<?php

class Comment extends Eloquent {
	protected $guarded = array(
		'id'
	);
	
	public function user()
	{
		return $this->belongsTo('User');
	}

	public function inventory()
	{
		return $this->hasMany('Comments');
	}


	public static $rules = array(
		'comment'		=> 'required|max:255'
		);

}