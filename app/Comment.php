<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

	//
	protected $table = 'comments';

	protected $fillable = ['comment_uuid', 'content', 'rank'];
}
