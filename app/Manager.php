<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{

    public function calls()
    {
        return $this->morphToMany('App\Call', 'employee');
    }

    public static function getFreeManager(){
        return Manager::where('status', 'FREE')->orderBy('answered_count', 'asc')->first();
    }
}
