<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Beswan extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'school'];

    public function payments()
    {
        return $this->hasMany('App\Payment');
    }
}


