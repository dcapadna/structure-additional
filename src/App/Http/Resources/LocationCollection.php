<?php

namespace Dcapi\Structure\Additional\App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class LocationCollection extends ResourceCollection
{
   

    public function toArray($request)
    {
        return $this->resource;
    }
}
