<?php

namespace Dcapi\Structure\Additional\Models;

use Dcapi\Structure\Branch\Models\Branch;
use Illuminate\Database\Eloquent\Model;

class Advantage extends Model
{
    protected $fillable = [
        "title",
        "image",
        "status",
        "order"
    ];


}
