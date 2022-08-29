<?php

namespace Dcapi\Structure\Additional\Models;

use Illuminate\Database\Eloquent\Model;

class FinancialBroker extends Model
{
    protected $fillable = ["title","code"];

    public $timestamps =false;
}
