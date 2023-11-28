<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class FlightResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'fromPlace' => $this->fromPlace,
            'toPlace' => $this->toPlace,
            // 'fromTime' => $this->fromTime->format('Y-m-d H:i:s'),
            // 'toTime' => $this->toTime->format('Y-m-d H:i:s'),
            'planName' => $this->planName,
            'price' => $this->price,
            'imagePlace' => URL::asset('Flights/'.$this->imagePlace),
            // 'duration' => $this->duration->format('H:i:s'),
            'road' => $this->road,
            'company_id'=>$this->company_id,
        ];
    }
}
