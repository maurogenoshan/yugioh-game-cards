<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Card as CardResource;

class Card extends Model
{
    use HasFactory;
    private $where_clauses;
    public $timestamps = false;

    public function types()
    {
        return $this->belongsToMany(Type::class);
    }

    public function filterPaginate($request)
    {

        $where_clauses = [];
        if ($request->has('DEF')) {
            $where_clauses['DEF'] = $request->input('DEF');
        }

        if ($request->has('ATK')) {
            $where_clauses['ATK'] = $request->input('ATK');
        }

        if ($request->has('starts')) {
            $where_clauses['starts'] = $request->input('starts');
        }

        if ($request->has('first_edition')) {
            $where_clauses['first_edition'] = $request->input('first_edition');
        }
        if (!empty($where_clauses)) {
            return $this->with('types')->where($where_clauses)->paginate($request->input('per_page'));
        }
        return $this->with('types')->paginate($request->input('per_page'));
    }
}
