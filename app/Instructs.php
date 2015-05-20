<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructs extends Model {

	//
	protected $table = 'instructs';

	protected $fillable = ['Teacher_ID', 'Course_No'];
}
