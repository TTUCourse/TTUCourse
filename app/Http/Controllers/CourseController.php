<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Course;
use App\Comment;
use App\Teacher;
use Auth;
use Illuminate\Http\Request;


class CourseController extends Controller {


	public function __construct()
	{
		$this->middleware('auth');
	}

	public function getIndex(){
		return view('course.course');
	}

	public function postIndex(Request $request)
	{
		return "unfinish";
	}

	public function getComment($courseId)
	{
		$course = Course::findOrFail($courseId);
		$teacher = $course->teacher[0];
		return view('course.comment', ['course'=>$course, 'teacher'=>$teacher]);
	}

	public function postComment(Request $request, $courseId)
	{
		$comment = new Comment(['content'=>$request->input('comment')]);
		$comment->save();
		$course = Course::find($courseId);
		$comment->course()->attach($courseId);
		$comment->user()->attach(Auth::user()->id);
		return redirect()->back();
	}
}
?>