<?php

class InventoryController extends \BaseController {
	protected $layout = "layouts.main";
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function __construct()
	{
		$this->beforeFilter('csrf', array('on' => 'post'));
		$this->beforeFilter('auth', array('only'=>array('index')));
	}

	public function index()
	{

		$this->layout->content = View::make('inventories.index')->with('inventories', Inventory::all() );
	}

	

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->content = View::make('inventories.create')->with('collections', Collection::all()->lists('name', 'id'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		

		if (Input::hasFile('image')) {
			$inventory 	  				= new Inventory();
			$inventory->title 			= Input::get('title');
			$inventory->description 	= Input::get('description');
			$inventory->users_id		= Input::get('users_id');
			$inventory->collection_id  = Input::get('collection');
			$md5 = md5_file(Input::file('image'));

			if (Input::file('image')->move(public_path().'/uploads/', $md5)) {
				$inventory->file_name = $md5;
				$inventory->save();
			}

			return Redirect::route('inventory.index');
		}

		
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$inventory 		= Inventory::find($id);
		$user			= Auth::user(); 
	
		$this->layout->content = View::make('inventories.show')->with('inventory', $inventory)->with('user', $user);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$inventory = Inventory::find($id);

		$this->layout->content = View::make('inventories.edit')->with('inventory', $inventory)->with('collections', Collection::all()->lists('name', 'id'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		
		$inventory 	  		= Inventory::find($id);
		$inventory->title 	= Input::get('title');
		$inventory->description 	= Input::get('description');
		$inventory->collection_id 	= Input::get('collection');
		$inventory->save();

		return Redirect::route('inventory.index');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$inventory = Inventory::find($id);
		$inventory->delete();

		 if(Input::get('album') == 'true')
		 	return Redirect::action('CollectionController@index');
		 else
		 	return Redirect::route('inventory.index');
	}




}
