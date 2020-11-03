<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'name', 'date', 'address', 'phoneNumber', 'information',
      ];

}
