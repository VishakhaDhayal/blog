<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
	use SoftDeletes;
	protected $fillable	=	[
		'title','content', 'featured', 'category_id', 'slug', 'user_id'
	];

	protected $dates = ['deleted_at'];
	// public $incrementing = false;


	public function getFeaturedAttribute($featured)
    {
        return asset($featured);
    }
    
    public function category()
    {
    	return $this->belongsTo('App\Category');
    }
    public function tags()
    {
    	return $this->belongsToMany('App\Tag');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
