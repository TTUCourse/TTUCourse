<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Course extends Model {

	//
	protected $table = 'courses';

	protected $primaryKey = 'course_no';

	protected $fillable = ['course_name', 'course_no', 'credit', 'department', 'essential', 'enrollment_limit', 'textbook'];

	public $timestamps = false;

	public function teacher()
	{
		//return DB::select('select * from teachers inner join(select * from instructs where instructs.course_no=:course_id) selected on selected.teacher_id=id', ['course_id' => $this->course_No]);
		return $this->belongsToMany('App\Teacher', 'instructs', 'course_no', 'teacher_id');
		//return $this->belongsToMany('App\Teacher', 'instructs', 'id', 'course_no');
		//return $this->hasManyThrough('App\Teacher', 'App\instructs', 'course_no', 'teacher_id');
	}

	public function comments()
	{
		return $this->belongsToMany('App\User', 'comments_to', 'user_id', 'id');
	}
}
