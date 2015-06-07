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
		$courses = Course::with('teacher')->get();
		//return $courses;
		return view('course.course', ['courses'=>$courses]);
	}

	public function postIndex(Request $request)
	{
		$courses = Course::whereRaw('department=?', [$request->input('department')])->get();
		return redirect()->back()->with('courses', $courses);
	}

	public function getComment($courseId)
	{
		$course = Course::findOrFail($courseId);
		$teacher = $course->teacher[0];
		$comment = $course->comments;
		//return $comment;
		return view('course.comment', ['course'=>$course, 'teacher'=>$teacher, 'comments'=>$comment]);
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