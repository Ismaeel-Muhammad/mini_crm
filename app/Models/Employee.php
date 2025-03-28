<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{    protected $fillable = ['name', 'username', 'password','creator','isAdmin'];
    public $timestamps = false;
}
