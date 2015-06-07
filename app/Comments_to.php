<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments_to extends Model {

	//
	protected $table = 'comments_tos';

	protected $primaryKey = 'comment_uuid';

	protected $fillable = ['course_no', 'comment_uuid'];

	public $timestamps = false;
}
