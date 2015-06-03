<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Course;

class CourseController extends Controller {


	public function __construct()
	{
		$this->middleware('auth');
	}

	public function getCourse($courseId)
	{
		return Course::findOrFail($courseId);
	}
}
?>