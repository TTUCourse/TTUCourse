<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Crypt;

class Comment extends Model {

	use SoftDeletes;

	protected $table = 'comments';

	protected $primaryKey = 'comment_uuid';

	protected $fillable = ['comment_uuid', 'content', 'rank'];

	protected $dates = ['deleted_at'];

	public function user()
	{
		return $this->belongsToMany('App\User', 'says', 'comment_uuid', 'user_id');
	}

	public function course()
	{
		return $this->belongsToMany('App\Course', 'comments_tos', 'comment_uuid', 'course_no');
	}

	public function getLikekeyAttribute()
	{
		$hash = Crypt::encrypt($this->comment_uuid);
		return $hash;
	}
}
