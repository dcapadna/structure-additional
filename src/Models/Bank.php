<?php

namespace Dcapi\Structure\Additional\Models;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = ["name","tbs_id"];

    public $timestamps=false;
}
