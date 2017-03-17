<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Posts extends Model
{
	use Sluggable; // Tạo Slug đường dẫn thân thiện

 	public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    protected $fillable = [
        'cate_id', 'user_created', 'user_update', 'title', 'description', 'content', 'slug', 'thumbnail', 'type', 'show_home', 'oder', 'views', 'status'
    ];

    public function getUpdatedAtAttribute($value)
    {
        return makeTimeAgo($value);
    }
    public function getCreatedAtAttribute($value)
    {
        return makeTimeAgo($value);
    }

    public function User()
    {
        return $this->belongsTo('App\User', 'user_created');
    }

    public function Categories()
    {
        return $this->belongsTo('App\Categories', 'cate_id');
    }

}
