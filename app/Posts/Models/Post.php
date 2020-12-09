<?php

namespace App\Posts\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title','written','review','visibility','image',
    ];

    public function getUser(){
        $name = DB::select('SELECT name FROM users WHERE id = ?', [$this->user_id]);
        return $name[0]->name;
    }

    public function getGender(){
        $name = DB::select('SELECT name FROM genders WHERE id = ?', [$this->gender_id]);
        return $name[0]->name;
    }
}
