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
        $cards = Card::with('types:id,name,parent_id')->Filter($request)->Paginate($request->input('per_page'));

        return $this->sendResponse(CardResource::collection($cards), "Post all");
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

    public function show(Card $card)
    {
        return new CardResource($card::with('types:id,name,parent_id'));
    }

    public function update(CardStoreRequest $request, Card $card)
    {
        $inputs = $request->validated();
        $inputs['image'] = $this->uploadImage($request);
        $card->update($inputs);
        $card->save();

        return $this->sendResponse(new CardResource($card), 'Post updated.');
    }

    public function destroy(Card $card)
    {

        $card->types()->detach();
        $card->delete();
        return $this->sendResponse([], 'Post deleted.');
    }
}
