<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Card;

use App\Http\Resources\CardResource;
use Illuminate\Support\Str;
use App\Http\Requests\CardStoreRequest;


class CardsController extends Controller
{

    public function index(Request $request)
    {
        $cards = Card::with('types')->Filter($request)->Paginate($request->input('per_page'));

        return CardResource::collection($cards);
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
