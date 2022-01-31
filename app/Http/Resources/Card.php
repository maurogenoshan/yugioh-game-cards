<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Card extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray([
            'name' => $request->name,
            'first_edition' => $request->first_edition,
            'serial_code' => $request->serial_code,
            'ATK' => $request->ATK,
            'DEF' => $request->DEF,
            'starts' => $request->starts,
            'description' => $request->description,
            'image' => $request->image,
            'date_created' => $request->date_created,

        ]);
    }
}
