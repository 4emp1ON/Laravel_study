<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    public function getAll() {
        return \DB::select("SELECT id, title, author, body, category_id FROM news");
    }

    public function getById(int $id) {
        return \DB::selectOne("SELECT id, title, author, body, category_id FROM news where id= :id", [
            'id' => $id
        ]);
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
