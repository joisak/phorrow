<?php

class CommentController extends \BaseController {


	public function store($id)
	{
			$validator = Validator::make(Input::all(), Comment::$rules);

			$comment = Inventory::find($id);

			if($validator->passes())
		{
			$comment = new Comment;
			$comment->content 	= Input::get('comment');
			$comment->user_id 	= Auth::user()->id;
			$comment->img_id 	= $id;
			$comment->save();

			return Redirect::to('/inventory/' . $id);
		}
		else
		{
			return Redirect::to('inventory')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();	
		}
		
	}

	public function destroy($id)
	{
		$comment 	  = Comment::find($id);
		$comment->delete();

		return Redirect::route('inventory.index');
	}

	

}