<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $image_uploaded_path = "users/".$this->image;

        return [
            'id' => $this->id,
            'fullname' => $this->name,
            'email' => $this->email,
            'gender' => $this->gender,
            'address' => $this->address,
            'telp' => $this->telp,
            'role' => $this->role,
            'image' => Storage::disk('public')->url($image_uploaded_path),
        ];
    }
}
