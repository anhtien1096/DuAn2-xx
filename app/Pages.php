<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Pages extends Model
{
	use Sluggable; // Tạo Slug đường dẫn thân thiện

 	public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected $fillable = ['name', 'slug', 'description', 'content','status'];

    public function getUpdatedAtAttribute($value)
    {
        return makeTimeAgo($value);
    }
    public function getCreatedAtAttribute($value)
    {
        return makeTimeAgo($value);
    }
}
