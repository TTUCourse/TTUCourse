<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model {

	//
  protected $table = 'courses';

  protected $fillable = ['course_name', 'course_no', 'credit', 'department', 'enrollment_limit', 'textbook'];

  public $timestamps = false;
}
