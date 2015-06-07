<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructs extends Model {

	//
	protected $table = 'instructs';

	protected $primaryKey = 'course_no';

	protected $fillable = ['teacher_id', 'course_no'];

	public $timestamps = false;
}
