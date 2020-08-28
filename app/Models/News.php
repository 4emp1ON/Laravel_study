<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeCoverage\TestFixture\C;

class News extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'id';
    protected $fillable = ['author', 'title', 'body'];

    public function categories() {
        return $this->belongsTo(Category::class);
    }
}
