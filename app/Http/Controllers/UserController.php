<?php namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class UserController extends Controller {

	public function __construct()
	{

		$this->middleware('auth');

	}

	/**
	 * Show the user profile to user.
	 *
	 * @return Response
	 */
	public function getProfile()
	{

		return view('user.profile');

	}

	/**
	 * Check then edit user's profile.
	 *
	 * @return Response
	 */
	public function postProfile(Request $request)
	{
		$this->validate($request, [
			'password' => 'min:8',
			'grade' => 'required|max:1',
			'department' => 'required|max:1',
			'nickname' => 'required|max:255',
		]);

		$user = Auth::user();

		if($request->has('password'))
		{
			$user->password = bcrypt($request->input('password'));
		}

		if($user->nickname != $request->input('nickname'))
		{
			$user->nickname = $request->input('nickname');
		}

		if($user->department != $request->input('department'))
		{
			$user->department = $request->input('department');
		}

		if($user->grade != $request->input('grade'))
		{
			$user->grade = $request->input('grade');
		}

		$user->save();

		return redirect()->back();
	}
}
?>
