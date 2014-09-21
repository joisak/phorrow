<?php

class Collection extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'collections';

	public $timestamps = false;

	public function inventory()
	{
		return $this->hasMany('Inventory');
	}

}
