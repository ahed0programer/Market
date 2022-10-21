<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['name', 'price', 'details'];
    protected $dates=['deleted_at'];

}