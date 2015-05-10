<?php namespace myblog\Http\Controllers;

use myblog\Http\Requests;
use myblog\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

	public function about()
	{
		$people = ['Rahul', 'Vibhor', 'Sunny'];
		return view('pages.about', compact('people'));
	}

	public function contact()
	{
		return view('pages.contact');
	}
}
