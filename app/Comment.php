<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

	//
	protected $table = 'comments';

	protected $primaryKey = 'comment_uuid';

	protected $fillable = ['comment_uuid', 'content', 'rank'];

	public function user()
	{
		return $this->belongsToMany('App\User', 'says', 'comment_uuid', 'id');
	}

	public function course()
	{
		return $this->belongsToMany('App\Course', 'Comments_to');
	}
}
