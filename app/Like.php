<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model {

	//
	protected $table = 'likes';

	protected $primaryKey = 'comment_uuid';

	protected $fillable = ['comment_uuid', 'user_id'];

	public $timestamps = false;
}
