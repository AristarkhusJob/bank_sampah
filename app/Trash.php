<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Trash extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'category_id', 'trash_name', 'price'];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function detailTransactions()
    {
        return $this->hasMany('App\DetailTransaction');
    }
}
