<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Course;
use App\Teacher;


class CourseController extends Controller {


	public function __construct()
	{
		$this->middleware('auth');
	}

	public function getCourse($courseId)
	{
		$teacher = Course::find($courseId)->teacher;
		return $teacher;
	}
}
?>