<?php

class CollectionController extends \BaseController {
	protected $layout = 'layouts/main';
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->layout->content = View::make('collections.index')->with('collections', Collection::all());
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->content = View::make('collections.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$collection 	  = new Collection();
		$collection->name = Input::get('name');
		$collection->save();

		return Redirect::route('collection.index');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$collection = Collection::find($id);
		$inventories = $collection->inventory;

		$this->layout->content = View::make('collections.show')->with('collection', $collection)->with('inventories', $inventories);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$collection = Collection::find($id);
		$inventories = $collection->inventory;
		$inventory = Inventory::find($id);

		$this->layout->content = View::make('collections.edit')->with('collection', $collection)->with('inventories', $inventories)->with('inventory', $inventory);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{		

		$collection 	  = Collection::find($id);
		$collection->name = Input::get('name');
		$collection->save();

		$this->layout->content = Redirect::route('collection.index');
		
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$collection 	  = Collection::find($id);
		$collection->delete();


		return Redirect::route('collection.index');
	}


}
