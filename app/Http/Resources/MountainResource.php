<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MountainResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "area" => $this->city,
            "image" => $this->image,
            "max_climber" => $this->max_climber,
            "duration" => [
                "day" => $this->day_duration,
                "night" => $this->night_duration
            ],
            "status" => [
                "is_open" => $this->is_open,
                "is_team_available" => $this->is_team_available
            ],
            "price" =>  $this->price
        ];
    }
}
