<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function getAll() {
        return
            \DB::select("SELECT id, name, description FROM categories", ['tableName' => $this->table]);

    }

    public function getById(int $id) {
        return \DB::selectOne("SELECT name, description FROM categories where id= :id", [
            'id' => $id,
        ]);
    }
}
