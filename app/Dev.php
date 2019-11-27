<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dev extends Model
{
    protected $fillable = ['login','name','avatar_url','bio','location','email','html_url'];
}
