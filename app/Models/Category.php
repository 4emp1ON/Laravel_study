<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'slug', 'description'];

    public function news() {
        return $this->belongsToMany(News::class, 'categories_has_news', 'category_id', 'news_id');
    }

}
