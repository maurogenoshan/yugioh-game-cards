<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Card;
use App\Http\Resources\Card as CardResource;
use Illuminate\Support\Str;
use App\Http\Requests\CardStoreRequest;


class CardsController extends BaseController
{

    public function index(Request $request)
    {
        $card = new Card;
        return CardResource::collection($card->filterPaginate($request));
    }

    public function store(CardStoreRequest $request)
    {
        $inputs = $request->validated();
        $inputs['image'] = $this->uploadImage($request);
        return $this->sendResponse(new CardResource(Card::create($inputs)), 'Post created.');
    }

    public function uploadImage($request)
    {
        if (!$request->hasFile("image")) return;

        $image = $request->file("image");
        $nombreimagen = Str::slug($request->name) . "." . $image->guessExtension();
        $ruta = public_path("img/post/");
        copy($image->getRealPath(), $ruta . $nombreimagen);
        return $nombreimagen;
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
