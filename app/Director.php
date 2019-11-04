<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    public function calls()
    {
        return $this->morphToMany('App\Call', 'employee');
    }
    public static function getFreeDirector(){
        return Director::where('status', 'FREE')->orderBy('answered_count', 'asc')->first();
    }
}
