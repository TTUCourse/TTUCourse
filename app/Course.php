<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model {

	//
  protected $table = 'courses';

  protected $fillable = ['Course_name', 'Course_No', 'Credit', 'Department', 'Enrollment_limit', 'Department', 'Room', 'Textbook'];

}
