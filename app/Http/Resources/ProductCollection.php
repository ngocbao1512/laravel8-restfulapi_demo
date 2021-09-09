<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Models\Product;
use App\Http\Resources\ProductSpecialResource;

class ProductCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function toArray($request)
    {
         return [
            //'data' => $this->collection,
            'data' => ProductSpecialResource::collection($this->collection),
            'links' => [
                'currentpage' => $this->currentPage(),
                'nextpage' => $this->nextPageUrl(),
                'prevpage' => $this->previousPageUrl(),
            ],
            
        ]; 
        
    }
}
