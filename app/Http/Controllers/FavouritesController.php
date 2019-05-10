<?php

namespace App\Http\Controllers;

use App\Favourites;
use Illuminate\Http\Request;


class FavouritesController extends Controller
{

    public function getAllFavourites()
    {
        return response()->json(Favourites::all());
    }

    public function getOneFavourite($id)
    {
        return response()->json(Favourites::find($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'type' => 'required',
            'entity_id' => 'required'
        ]);

        $favourites = Favourites::create($request->all());

        return response()->json($favourites, 201);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'type' => 'required',
            'entity_id' => 'required'
        ]);

        $favourites = Favourites::findOrFail($id);
        $favourites->update($request->all());

        return response()->json($favourites, 200);
    }

    public function delete($id)
    {
        Favourites::findOrFail($id)->delete();
        return response('Successfully Deleted Favourites', 200);
    }


}