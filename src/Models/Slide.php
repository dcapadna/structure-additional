<?php

namespace Dcapi\Structure\Additional\Models;

use Dcapi\Structure\Branch\Models\Branch;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $fillable = [
        "title",
        "body",
        "image",
        "branch_id",
        "qr",
        "status"];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

}
