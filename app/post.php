<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Carbon\Carbon;
use App\Comment;
use App\Category;
use App\Tag;

class Post extends Model
{
	protected $fillable = ['user_id', 'category_id', 'title', 'body'];

    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, $filter) {
	    if(isset($filter['month'])) {
	        $query->whereMonth('created_at', Carbon::parse($filter['month'])->month);
	    }
	    if(isset($filter['year'])) {
	        $query->whereYear('created_at', $filter['year']);
	    }
    }

    public static function archives() {
    	return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
	    ->groupBy('year', 'month')
	    ->orderByRaw('year, month desc')
	    ->get()
	    ->toArray();
	  }

	  public function comments() {
	  	return $this->hasMany(Comment::class);
	  }

	  public function addComments($request) {
	  	$this->comments()->create($request->all());
	  }

	  public function tags() {
	  	return $this->belongsToMany(Tag::class);
	  }

	  public function category() {
	  	return $this->belongsTo(Category::class);
	  }
}