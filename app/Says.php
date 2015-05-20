<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Says extends Model {

	//
	protected $table = 'says';

	protected $fillable = ['Comment_UUID', 'user_id'];
}
