<?php

namespace Dcapi\Structure\Additional\App\Http\Controllers;

use App\Http\Controllers\BaseController;
use Dcapi\Structure\Additional\App\Http\Resources\LocationCollection;
use Dcapi\Structure\Additional\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LocationsController extends BaseController
{
    public function index(Request $request,$parent_id=null)
    {
        $locations = Location::query();
        $locations->where("parent_id",$parent_id);
        $locations = $locations->get();
        $data = [
            'locations' => new LocationCollection($locations)
        ];

        return $this->responseData(self::SUCCESS, $data);
    }

    
}
