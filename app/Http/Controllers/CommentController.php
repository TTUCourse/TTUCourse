<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Comment;
use Auth;
use Crypt;
use Request;


class CommentController extends Controller {


	public function __construct()
	{
		$this->middleware('auth');
	}

	public function getLike($hashedLikeId)
	{
		//if(Request::ajax()){
		$comment_id = Crypt::decrypt($hashedLikeId);
		$comment = Comment::find($comment_id);
		$likeUserArray = $comment->whoLikes->toArray();
		$user = Auth::user()->toArray();
		foreach ($likeUserArray as $who) {
			$result = array_intersect_assoc($who, $user);
			if(array_key_exists('id', $result)){
				return response()->json(['success'=>false, 'rank'=>$comment->rank]);
			}
		}
		$comment->rank++;
		$comment->save();
		$comment->whoLikes()->attach(Auth::user()->id);
		return response()->json(['success'=>true, 'rank'=>$comment->rank]);
		//}
		//abort(404);
	}

	public function getUnlike($hashedLikeId)
	{
		//if(Request::ajax()){
		$comment_id = Crypt::decrypt($hashedLikeId);
		$comment = Comment::find($comment_id);
		$likeUserArray = $comment->whoLikes->toArray();
		$user = Auth::user()->toArray();
		foreach ($likeUserArray as $who) {
			$result = array_intersect_assoc($who, $user);
			if(array_key_exists('id', $result)){
				$comment->whoLikes()->detach(Auth::user()->id);
				$comment->rank--;
				$comment->save();
				return response()->json(['success'=>true, 'rank'=>$comment->rank]);
			}
		}
		return response()->json(['success'=>false, 'rank'=>$comment->rank]);
		//}
		//abort(404);
	}

	public function getDelete($hashedLikeId)
	{
		$comment_id = Crypt::decrypt($hashedLikeId);
		$comment = Comment::find($comment_id);
		if($comment->user[0]->id == Auth::user()->id){
			$comment->delete();
		}
		return redirect()->back();
	}
}
?>
