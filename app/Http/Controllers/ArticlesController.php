<?php namespace myblog\Http\Controllers;

use myblog\Http\Requests;
use myblog\Http\Controllers\Controller;
use Carbon\Carbon;
use myblog\Http\Requests\CreateArticleRequest;
use myblog\Article;
use Auth;


class ArticlesController extends Controller {



	public function __construct()
	{

		$this->middleware('auth', ['only' => 'create']);
	}

	public function index(){

		$articles = Article::latest('published_at')->published()->get();
		return view('articles.index', compact('articles'));
	}


	public function show(Article $article){


		// dd($article->published_at->diffForHumans());

		return view('articles.show', compact('article'));

	}

	public function create()
	{
		$tags = \myblog\Tag::lists('name', 'id');
		return view('articles.create', compact('tags'));
	}

	public function store(CreateArticleRequest $request)
	{

		$this->createArticle($request);

		flash()->success('you created new article!');
		
		return redirect('articles');
	}

	public function edit(Article $article)
	{
		$tags = \myblog\Tag::lists('name', 'id');

		return view('articles.edit', compact('article', 'tags'));
	}

	public function update(Article $article, CreateArticleRequest $request)
	{

		$article->update($request->all());

		$this->syncTags($article, $request->input('tag_list'));

		return redirect('articles');
	}


	private function syncTags(Article $article, array $tags){

		$article->tags()->sync($tags);
	}

	private function createArticle(CreateArticleRequest $request){

		$article = Auth::user()->articles()->create($request->all());

		$this->syncTags($article, $request->input('tag_list'));

		return $article;
	}

}
