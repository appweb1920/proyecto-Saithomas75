<?php

namespace App\Posts\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'comment',
    ];

    public function getUser(){
        $name = DB::select('SELECT name FROM users WHERE id = ?', [$this->user_id]);
        return $name[0]->name;
    }
}
