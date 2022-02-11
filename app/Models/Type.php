<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    public function parenttype()
    {

        return $this->hasMany('App\Models\Type', 'parent_id');
    }

    public function scopeHasParent($query)
    {
        return $query->where('parent_id', '=', 0);
    }

    public function scopeFilterParent($query, $type)
    {
        return $query->where('name', '=', $type);
    }
}
