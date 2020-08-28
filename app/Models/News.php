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

    public function getByCategory(int $id) {
        return \DB::select("
            SELECT n.id, n.title, n.author, n.body, c.name
                FROM news n
                LEFT JOIN categories c
                ON n.category_id = c.id
            WHERE category_id= :category_id", [
            'category_id' => $id
        ]);
    }
}
