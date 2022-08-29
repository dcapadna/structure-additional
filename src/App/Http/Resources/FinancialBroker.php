<?php

namespace Dcapi\Structure\Additional\App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FinancialBroker extends JsonResource
{


    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' =>  $this->id,
            'title' => $this->title,
        ];
    }
}
