<?php

namespace Dcapi\Structure\Additional\App\Http\Controllers;

use App\Http\Controllers\BaseController;
use Dcapi\Structure\Additional\Models\Bank;
use Dcapi\Structure\Additional\App\Http\Resources\BankCollection;
use Illuminate\Http\Request;

class BanksController extends BaseController
{
    public function index(Request $request)
    {
        $banks = Bank::query();
        $banks = $banks->get();
        $data = [
            'banks' => new BankCollection($banks)
        ];

        return $this->responseData(self::SUCCESS, $data);
    }

    
}
