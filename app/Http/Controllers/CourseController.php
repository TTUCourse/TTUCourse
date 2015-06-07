<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Course;


class CourseController extends Controller {


	public function __construct()
	{
		$this->middleware('auth');
	}

	public function getIndex(){
		return view('course.course');
	}

	public function getComment($courseId)
	{
		$course = Course::findOrFail($courseId);
		$teacher = $course->teacher[0];
		return view('course.comment', ['course'=>$course, 'teacher'=>$teacher]);
	}
}
?>