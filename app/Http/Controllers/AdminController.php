<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Auth;


class AdminController extends Controller {


  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('admin');
  }

  public function getIndex()
  {
    return "helloAdmin";
  }
}
?>
