<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Type;
class TypeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    
    public function toArray($request)
    {
        $parent = Type::find($this->parent_id);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'parent_id' => ($this->parent_id)?$this->parent_id:null,
            'parent_name' => ($parent && $parent->name)?$parent->name:null
        ];
    }
}
