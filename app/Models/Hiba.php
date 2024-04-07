<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //lehet alapból benne van mert ez még csak lara 10. verzió, de azért beletettem
use Illuminate\Database\Eloquent\Relations\BelongsTo; //ua.

class Hiba extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        "hibaMegnevezese",
        "hibaLeirasa",
        "hibaHelye",
        "hibaKepe",
        //"bejelentesIdopontja",
        "hibaAllapota",
        "user_id"
    ];

    protected $hidden = ["created_at", "updated_at"];

    public function user() : BelongsTo  //a hibához tartozó felhasználó adatai
    {
        return $this->belongsTo(User::class);
    }
}
