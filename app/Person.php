<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
     protected $fillable = [
        'name', 'height', 'mass','gender','birth_year'
    ];

}
