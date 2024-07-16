<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class TrainingResource extends JsonResource
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
            "id" => $this->id,
            "name"=> $this->name,
            "software"=> $this->software,
            "date"=> $this->start_date,
            "end_date"=> $this->end_date,
            "endOfRegistration" => Carbon::parse($this->start_date)->subWeeks(3)->toDateString(),
            "amount"=> number_format($this->price),
            "virtual_amount"=> number_format($this->virtual_price),
            "venue"=> $this->location,
        ];
    }
}
