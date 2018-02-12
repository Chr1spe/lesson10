<?php

namespace App;


class Post extends Model
{
    //

    //protected $fillable = ['title', 'body'];

    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function addComment($body, $user)
    {
    	/*Comment::create([
    		'body' => $body,
    		'post_id' => $this->id
    	]);*/

    	$this->comments()->create([
    	    'body'    => $body,
            'user_id' => $user->id
        ]);
    }

    public function scopeFilter($query, $filters)
    {
        if(isset($filters['month'])){
            $query->whereMonth('created_at', \Carbon\Carbon::parse($filters['month'])->month);
        }

        if(isset($filters['year'])){
            $query->whereYear('created_at', $filters['year']);
        }

        //$query = $query->get();
    }


    public static function archives()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')->orderByRaw('min(created_at) desc')->get()->toArray();
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
