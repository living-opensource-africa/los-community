<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     *  Allow mass assignment of role name
     *  @var Array
     */
    protected $fillable = [
        'name'
    ];
}
