<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
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
            'id' => $this->id,
            'leader' => [
                'id' => $this->leader_id,
                'name' => $this->leader_name,
                'image' => $this->leader_image
            ],
            'mountain' => [
                'id' => $this->mountain_id,
                'name' => $this->mountain_name,
                'price' => $this->price
            ],
            'member' => [
                'count' => $this->member_count,
                'max' => $this->member_max
            ],
            'schedule' => [
                'go' => $this->schedule_go,
                'home' => $this->schedule_home
            ],
            'price' => ($this->price * $this->member_count)
        ];
    }
}
