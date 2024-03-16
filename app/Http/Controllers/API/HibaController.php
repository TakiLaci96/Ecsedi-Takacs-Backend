<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Hiba;
use Illuminate\Http\Request;

class HibaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hibak = Hiba::all();
        return $hibak;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $hiba = Hiba::create($request->all());
        return $hiba;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $hiba = Hiba::find($id);
        if (is_null($hiba)) {
            return response()->json(["message" => "Nincs ilyen azonosító: $id"], 404);
        }
        return $hiba;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $hiba = Hiba::find($id);
        if (is_null($hiba)) {
            return response()->json(["message" => "Nincs ilyen azonosító: $id"], 404);
        }
        $hiba->fill($request->all());
        $hiba->save();
        return $hiba;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hiba = Hiba::find($id);
        if (is_null($hiba)) {
            return response()->json(["message" => "Nincs ilyen azonosító: $id"], 404);
        }
        $hiba->delete();
        return response()->noContent();
    }
}
