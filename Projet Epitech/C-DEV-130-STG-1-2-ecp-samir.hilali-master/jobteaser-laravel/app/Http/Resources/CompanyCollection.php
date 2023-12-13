<?php

namespace App\Http\Resources;

use App\Http\Resources\Company as CompanyResource;
use App\Models\Company;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CompanyCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'data' => $this->collection,
            'version' => "0.0.1",
            'author' => "samir.hilali@epitech.eu"

        ];
    }
}
