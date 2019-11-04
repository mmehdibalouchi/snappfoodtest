<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respondent extends Model
{
    public function calls()
    {
        return $this->morphToMany('App\Call', 'employee');
    }

    public static function getFreeRespondent(){
        return Respondent::where('status', 'FREE')->orderBy('answered_count', 'asc')->first();
    }
}
