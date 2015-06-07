<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model {

	//
	protected $table = 'teachers';

	protected $fillable = ['name', 'sex', 'office', 'departnemt'];

	public $timestamps = false;

	public function course()
	{
		return $this->hasManyThrough('App\Course', 'App\Instructs', 'teacher_id', 'course_no');
	}
}
