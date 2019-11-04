<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function calls()
    {
        return $this->belongsToMany("App/Call");
    }


    public static function getFreeEmployee(){
        return Employee::orderByRaw("FIELD(role , 'RESPONDENT', 'MANAGER', 'DIRECTOR') DESC")->orderBy('answered_count', 'asc')->first();
    }
}
