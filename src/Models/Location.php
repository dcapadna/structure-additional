<?php

namespace Dcapi\Structure\Additional\Models;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Location extends Model
{
    use NodeTrait;
    protected $fillable = ['title','parent_id'];
}
