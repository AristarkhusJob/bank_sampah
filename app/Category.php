<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'category_name'];

    public function trashes()
    {
        return $this->hasMany('App\Trash');
    }

}
