<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Card;
use App\Http\Resources\Card as CardResource;

use App\Http\Requests\CardStoreRequest;


class CardsController extends BaseController
{

    public function index(Request $request)
    {
        return CardResource::collection(Card::filterPaginate($request));
    }

    public function store(CardStoreRequest $request)
    {
        $inputs = $request->validated();
        return $this->sendResponse(new CardResource(Card::create($inputs)), 'Post created.');
    }

    public function show($id)
    {
        return new CardResource(Card::findOrFail($id));
    }

    public function update(CardStoreRequest $request, Card $card)
    {
        $inputs = $request->validated();
        $card->update($inputs);
        $card->save();

        return $this->sendResponse(new CardResource($card), 'Post updated.');
    }

    public function destroy(Card $card)
    {
        $card->delete();
        return $this->sendResponse([], 'Post deleted.');
    }
}
