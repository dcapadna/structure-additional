<?php

namespace Dcapi\Structure\Additional\Models;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $fillable=["title"];

    public $timestamps= false;

    protected $table = "works";
}
