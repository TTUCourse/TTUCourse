<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['fname', 'lname', 'email', 'password', 'sex', 'department', 'grade', 'nickname'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public function getGravatarAttribute()
	{
		$hash = md5(strtolower(trim($this->attributes['email'])));
		$url = 'https://secure.gravatar.com/avatar/'.$hash;
		return $url;
	}

	public function comments()
	{
		return $this->hasManyThrough('App\Comment', 'App\Says', 'user_id', 'comment_uuid');
	}

	public function likes()
	{
		return $this->hasManyThrough('App\Comment', 'App\Like', 'user_id', 'comment_uuid');
	}

	public function isLiked($comment_uuid)
	{
		foreach ($this->likes as $value) {
			if($value->comment_uuid == $comment_uuid){
				return true;
			}
		}
		return false;
	}

}
