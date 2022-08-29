<?php

namespace Dcapi\Structure\Additional\App\Http\Controllers;

use App\Http\Controllers\BaseController;
use Dcapi\Structure\Additional\Models\FinancialBroker;
use Dcapi\Structure\Additional\App\Http\Resources\FinancialBrokerCollection;
use Illuminate\Http\Request;

class FinancialBrokersController extends BaseController
{
    public function index(Request $request)
    {
        $financial_broker = FinancialBroker::query();
        $financial_broker = $financial_broker->get();
        $data = [
            'financial_broker' => new FinancialBrokerCollection($financial_broker)
        ];

        return $this->responseData(self::SUCCESS, $data);
    }

    
}
