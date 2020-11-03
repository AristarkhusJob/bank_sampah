<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Payment extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'beswan_id', 'month', 'year', 'price'];

    public function beswan(){
        return $this->belongsTo('App\Beswan');
    }

}
