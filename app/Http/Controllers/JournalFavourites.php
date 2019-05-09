<?php

namespace App\Http\Controllers;

use App\JournalFavourites;
use Illuminate\Http\Request;


class JournalFavouritesController extends Controller
{

    public function getAllJournalFavourites()
    {
        return response()->json(JournalFavourites::all());
    }

    public function getOneJournalFavourite($id)
    {
        return response()->json(JournalFavourites::find($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'list' => 'required'
        ]);

        $favourites = JournalFavourites::create($request->all());

        return response()->json($favourites, 201);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'list' => 'required'
        ]);

        $favourites = JournalFavourites::findOrFail($id);
        $favourites->update($request->all());

        return response()->json($favourites, 200);
    }

    public function delete($id)
    {
        JournalFavourites::findOrFail($id)->delete();
        return response('Successfully Deleted JournalFavourites', 200);
    }


}