<?php namespace myblog;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model {

    protected $table = 'articles';
    protected $dates = ['published_at'];
	public $timestamps = false;
	protected $fillable = ['title', 'body', 'published_at', 'user_id'];

	public function setPublishedAtAttribute($date)
	{
		$this->attributes['published_at'] = Carbon::parse($date);

	}

	public function scopePublished($query)
	{
		$query->where('published_at', '<=', Carbon::now());
	}


	public function scopeUnpublished($query)
	{
		$query->where('published_at', '>', Carbon::now());
	}

	public function user()
	{

		return $this->belongsTo('myblog\User');
	}

	public function tags(){

		return $this->belongsToMany('myblog\Tag')->withTimestamps();
	}

	public function getTagListAttribute(){

		return $this->tags->lists('id');
	}

	public function getPublishedAtAttribute($date){

		return Carbon::parse($date)->format('Y-m-d');
	}

}
