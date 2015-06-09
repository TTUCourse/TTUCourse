<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Course;
use App\Comment;
use App\Teacher;
use Auth;
use DB;
use Illuminate\Http\Request;


class CourseController extends Controller {


	public function __construct()
	{
		$this->middleware('auth');
	}

	public function getIndex()
	{
		//$courses = Course::with('teacher')->get();
		//return view('course.course', ['courses'=>$courses]);
		return view('course.course');
	}

	public function postIndex(Request $request)
	{
		$department = $request->input('department');
		$course_no = $request->input('course_no');
		$course_name = $request->input('course_name');
		$teacher = $request->input('teacher');
		/*$courses = Course::where('department', $department)
						->orWhere('course_no', 'like', '%'.$course_no.'%')
						->orWhere('course_name', 'like', '%'.$course_name.'%')
						->orWhere('teacher', 'like', '%'.$teacher.'%')
						->get();*/
		$courses = DB::table('courses')
					->join('instructs', 'instructs.course_no', '=', 'courses.course_no')
					->join('teachers', 'teachers.id', '=', 'instructs.teacher_id')
					->where('courses.department', $department)
					->where('courses.course_no', 'like','%'.$course_no.'%')
					->where('courses.course_name', 'like', '%'.$course_name.'%')
					->where('teachers.name', 'like', '%'.$teacher.'%')
					->get();
		//return $courses;
		return view('course.course', ['courses'=>$courses]);
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
		if(null !== $request->input('anonymous')){
			$comment->anonymous=$request->input('anonymous');
		}
		$comment->save();
		$course = Course::find($courseId);
		$comment->course()->attach($courseId);
		$comment->user()->attach(Auth::user()->id);
		return redirect()->back();
	}
}
?>