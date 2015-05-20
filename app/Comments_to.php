<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments_to extends Model {

	//
	protected $table = 'comments_tos';

	protected $fillable = ['Course_No', 'Comment_UUID'];
}
