<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'parent', 'description', 'order', 'add_to_menu'
    ];

    protected $casts = [
        'add_to_menu'   => 'boolean',
        'status'        => 'boolean',
    ];

    /**
     * @param $name
     */
    public function setNameAttribute($name)
    {
        $this->attributes['name'] = trim(mb_convert_case($name, MB_CASE_TITLE, 'UTF-8'));
    }

    /**
     * @param $slug
     */
    public function setSlugAttribute($slug)
    {
        $this->attributes['slug'] = str_slug(trim(!empty($slug) ? $slug : $this->attributes['name']));
    }

    /**
     * @param $value
     */
    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = !empty($value) ? $value : '';
    }

    /**
     * @param $value
     */
    public function setParentAttribute($value)
    {
        $this->attributes['parent'] = !empty($value) ? $value : 0;
    }

    /**
     * @param $value
     */
    public function setAddToMenuAttribute($value)
    {
        $this->attributes['add_to_menu'] = 0;
    }

    /**
     * @param $value
     * @return string
     */
    public function getUpdatedAtAttribute($value)
    {
        return makeTimeAgo($value);
    }

    /**
     * @param $value
     * @return string
     */
    public function getCreatedAtAttribute($value)
    {
        return makeTimeAgo($value);
    }

    /**
     * @param $value
     * @return mixed
     */
    public function getParentAttribute($value)
    {
        foreach ($this->getAllCategories() as $v) :
            if ($v->id == $value) {
                return $v->name;
            }
        endforeach;
        return 'Trống';
    }

    private function getAllCategories()
    {
        return Categories::select('id', 'name')
            ->where([
                ['parent', 0],
                ['status', 1]
            ])->get();
    }

    public function Posts()
    {
        return $this->hasMany(Posts::class);
    }
}
