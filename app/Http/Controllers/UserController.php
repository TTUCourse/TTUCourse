<?php namespace App\Http\Controllers;

use Auth;

class UserController extends Controller {

	public function __construct() {

		$this->middleware('auth');

	}

	public function getIndex()
	{

		return view('user.profile');

    }
}
?>
