<?php

namespace App\Resources\Dashboard;

use Illuminate\Http\Resources\Json\JsonResource;

class ChartResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'date' => $this->date,
            'sum' => $this->sum,
        ];
    }
}
