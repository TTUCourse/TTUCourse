<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments_to extends Model {

	//
	protected $table = 'comments_tos';

	protected $fillable = ['course_no', 'comment_uuid'];

	public $timestamps = false;
}