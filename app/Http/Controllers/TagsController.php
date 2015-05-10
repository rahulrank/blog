<?php namespace myblog\Http\Controllers;

use myblog\Http\Requests;
use myblog\Http\Controllers\Controller;

use Illuminate\Http\Request;
use myblog\Tag;

class TagsController extends Controller {

	public function show(Tag $tag){

		$articles = $tag->articles()->published()->get();

		return view('articles.index', compact('articles'));
	}

}
