<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Comment;
use Auth;
use Crypt;


class CommentController extends Controller {


	public function __construct()
	{
		$this->middleware('auth');
	}

	public function getLike($hashedLikeId)
	{
		$comment_id = Crypt::decrypt($hashedLikeId);
		$comment = Comment::find($comment_id);
		$comment->rank++;
		$comment->save();
		return redirect()->back();
	}

	public function getDelete($hashedLikeId)
	{
		$comment_id = Crypt::decrypt($hashedLikeId);
		$comment = Comment::find($comment_id);
		$comment->delete();
		return redirect()->back();
	}
}
?>