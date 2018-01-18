<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
class PagesController extends Controller{
	public function getIndex(){
		return view('welcome');

	}

	public function getfilmshare(){
		$first = 'dora';
		$last = 'tian';
		$fullname = $first . " " . $last;
		$email = "ti@qq.com";
		$data = [];
		$data['email'] = $email;
		$data['fullname'] = $fullname;
		/*return view('filmshare')->with("fullname", $full);return view('filmshare')->withFullname($fullname)->withEmail($email);*/
		$forums = DB::table('forums')->get();
		return view('filmshare')->withData($data);
		

	}

	public function postfilmshare(){

	}

}

