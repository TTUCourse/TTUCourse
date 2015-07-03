<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Says extends Model {

	//
	protected $table = 'says';

	protected $primaryKey = 'comment_uuid';

	protected $fillable = ['comment_uuid', 'user_id'];

	public $timestamps = false;
}
