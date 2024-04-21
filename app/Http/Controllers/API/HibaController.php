<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Hiba;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Requests\HibaRequest;

class HibaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexAll()
    {
        $hibak = Hiba::all();
        return $hibak;
    }

     public function index()
    {
        #$hibak = Hiba::all();
        #return $hibak;


        $user = auth()->user(); //bejelentkezett felhasználó azonosítása
        #return Bejelentes::where("user_id", $user->$id)->get();
        return $user->hibak; //hasMany kapcsolat miatt
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HibaRequest $request)
    {
        #$hiba = Hiba::create($request->all());
        #return $hiba;

        //a létrehozott bejelentésbe elmenti a felhasználó id-ját
        $user = auth()->user();
        $hiba = new Hiba($request->all());
        $hiba->user_id = $user->id;
        //van-e kép
        $file = $request->file("hibaKepeLink");
        if (!is_null($file)) {
            $utvonal = $file->store("storage/images/bejelentesek", ["disk" => "public"]);
            $hiba->hibaKepeLink = $utvonal; //link hozzáférés

        // HA NEM JÖN BE BASE64 KÓD, CSAK A FÁJL, AKKOR GENERÁLJA LE A BASE64 KÓDOT
        if (is_null($hiba->hibaKepe)) {
            $image = file_get_contents($file);
            $hiba->hibaKepe = base64_encode($image); //base64 kódolás
        } else {
            $hibaKepe = 'hiba';
        }
            //
        }


        $hiba->save();
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
        $this->authorize("view", $hiba); //view Policy alapján tekintheted meg a bejelentéseket
        return $hiba;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HibaRequest $request, string $id)
    {
        $hiba = Hiba::find($id);
        if (is_null($hiba)) {
            return response()->json(["message" => "Nincs ilyen azonosító: $id"], 404);
        }
        $this->authorize("update", $hiba); //update Policy alapján módosíthatod a bejelentéseket
        $hiba->fill($request->all());
        $file = $request->file("hibaKepeLink");
        if (!is_null($file)) {
            $image = $file->store("storage/images/bejelentesek", ["disk" => "public"]);
            $hiba->hibaKepeLink = $image;
        }
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
        $this->authorize("delete", $hiba); //delete Policy alapján törölheted a bejelentéseket
        $hiba->delete();
        return response()->noContent();
    }

    public function kukaAdmin() //összes törölt elemet láthatja az admin
    {
        $hibak = Hiba::onlyTrashed()->get();
        return $hibak;
    }

    public function kukaUser() //a törölt elemeit láthatja a felhasználó
    {
        #$user = auth()->user();
        #$hibak = $user->hibak()->onlyTrashed()->get();
        #return $hibak;

        /*
        $hibak = Hiba::onlyTrashed()->get();
        $this->authorize("view", $hibak);
        return $hibak;
        */

        $user = auth()->user(); // Az aktuális felhasználó lekérése
        $hibak = $user->hibak()->onlyTrashed()->get(); // Az aktuális felhasználóhoz tartozó, törölt hibák lekérése
        #$this->authorize("view", $hibak); // Ellenőrizni, hogy az aktuális felhasználóhoz tartozik-e a hiba
        return $hibak; // A törölt hibák visszaadása
    }

    //Kép törlése
    public function removeImage(string $id)
    {
        $hiba = Hiba::find($id);
        if (is_null($hiba)) {
            return response()->json(["message" => "Nincs ilyen azonosító: $id"], 404);
        }
        $this->authorize("update", $hiba);
        $hiba->hibaKepe = null;
        $hiba->hibaKepeLink = null;
        $hiba->save();
        return $hiba;
    }

}
