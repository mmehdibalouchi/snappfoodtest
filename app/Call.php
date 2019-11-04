<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    protected $fillable = ['phone'];

    public function employee()
    {
        return $this->hasOne("App/Employee");
    }
}
