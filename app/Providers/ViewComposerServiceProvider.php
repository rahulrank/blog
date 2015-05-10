<?php namespace myblog\Providers;

use Illuminate\Support\ServiceProvider;
use myblog\Article;

class ViewComposerServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		view()->composer('partials.nav', function($view) 
		{

			$view->with('latest', Article::latest('published_at')->first());
		});
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

}
