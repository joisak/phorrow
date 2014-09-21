<?php

class Inventory extends Eloquent {

	use SoftDeletingTrait;

	protected $dates = ['deleted_at'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'inventory';

	protected $softDelete = true;

	public function collection()
	{
		return $this->belongsTo('Collection');
	}

	public function comments()
	{
		return $this->hasMany('Comment', 'img_id', 'id');
	}

	public function img()
	{
		return $this->belongsTo('Img');
	}

	public function user()
	{
		return $this->belongsTo('User');
	}
}
