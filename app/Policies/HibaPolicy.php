<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Hiba;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class HibaPolicy //kinek mire van jogosultsága
{
    public function viewAny(User $user): bool //minden hibát megtekinthet
    {
        /*
        BE KELL ÁLLÍTANI HOGY CSAK ADMIN LÁTHASSA, KELL ADMIN OSZLOP AZ USERS TÁBLÁBAN
         role: admin, user
         return $user->role == "admin"
         */
        return true;
    }

    public function view(User $user, Hiba $hiba): bool //adott hibát megtekinthet
    {
        return $user->id == $hiba->user_id;
    }

    public function create(User $user): bool //új hibát létrehozhat
    {
        return true;
    }

    public function update(User $user, hiba $hiba): bool //adott hibát módosíthat
    {
        return $user->id == $hiba->user_id;
    }

    public function delete(User $user, hiba $hiba): bool //adott hibát törölhet
    {
        return $user->id == $hiba->user_id;
    }

    public function restore(User $user, hiba $hiba): bool //adott hibát visszaállíthat
    {
        //ITT IS ADMINRA KELL ÁLLÍTANI
        return $user->id == $hiba->user_id;
    }

    public function forceDelete(User $user, Advertisement $hiba): bool //adott hibát végleg törölhet
    {
        //ITT IS ADMINRA KELL ÁLLÍTANI
        return $user->id == $hiba->user_id;
    }
}
