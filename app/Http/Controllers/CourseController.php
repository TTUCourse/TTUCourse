<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Course;
use App\Teacher;


class CourseController extends Controller {


	public function __construct()
	{
		$this->middleware('auth');
	}

	public function getIndex(){
		return view('course.course');
	}

	public function getCourse($courseId)
	{
		//$teacher = Course::findOrFail($courseId)->teacher;
		return view('course.comment');
	}
}
?>