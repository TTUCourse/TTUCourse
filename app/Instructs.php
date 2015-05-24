<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructs extends Model {

	//
	protected $table = 'instructs';

	protected $fillable = ['teacher_id', 'course_no'];

	public $timestamps = false;
}
