<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Mail;
use Session;
use App\User;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);
	}

	public function verify($activate_code)
	{
		$user = User::where('activate_code', '=', $activate_code)->first();

		if(!$user){
			abort(404);
		}

		$user->activate = 1;
    $user->activate_code = null;
    $user->save();

		Session::flash('message', '認證成功');

		return redirect('/auth/login/');
	}

	public function postRegister(Request $request)
	{
		$validator = $this->registrar->validator($request->all());

		if ($validator->fails())
		{
			$this->throwValidationException(
				$request, $validator
			);
		}

		$user = $this->registrar->create($request->all());
		$confirmation_code = $user->activate_code;

		Mail::send('emails.verify', ['confirmation_code' => $confirmation_code], function($message) use ($request) {
			$message->to($request->email, $request->fname)
							->subject('課評網註冊驗證信');
		});
		Session::flash('message', '請前往信箱收取認證信');
		return redirect('/auth/login/');
	}

	public function postLogin(Request $request)
	{
		$this->validate($request, [
			'email' => 'required|email', 'password' => 'required',
		]);

		$input = $request->only('email', 'password');

		$credentials = [
			'email' => $input['email'],
			'password' => $input['password'],
			'activate' => 1
		];

		if ($this->auth->attempt($credentials, $request->has('remember')))
		{
			return redirect()->intended($this->redirectPath());
		}

		return redirect($this->loginPath())
					->withInput($request->only('email', 'remember'))
					->withErrors([
						'email' => $this->getFailedLoginMessage(),
					]);
	}

	protected function getFailedLoginMessage()
	{
		return '帳號/密碼錯誤喔！';
	}

}
