<?php

namespace Dcapi\Structure\Additional\App\Http\Controllers;


use App\Http\Controllers\BaseController;
use Dcapi\Structure\Additional\App\Http\Resources\WorkCollection;
use Dcapi\Structure\Additional\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class WorksController extends BaseController
{
    public function index(Request $request)
    {
        $works = Work::query();
        $works = $works->get();
        $data = [
            'works' => new WorkCollection($works)
        ];

        return $this->responseData(self::SUCCESS, $data);
    }

    
}
