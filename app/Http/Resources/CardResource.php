<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CardResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'type' => 'card',
            'id' => (string) $this->id,
            'attributes' => [
                'name' => $this->name,
                'first_edition' => $this->first_edition,
                'serial_code' => $this->serial_code,
                'ATK' => $this->ATK,
                'DEF' => $this->DEF,
                'starts' => $this->starts,
                'description' => $this->description,
                'image' => $this->image,
                'date_created' => $this->date_created,

            ],
            'relationships' => [
                'types' => [

                    'type' => 'type',
                    "data" => TypeResource::collection($this->types)

                ]
            ]
        ];
    }

    public function with($request)
    {
        return ['included' => [TypeResource::collection($this->types)]];
    }
}
