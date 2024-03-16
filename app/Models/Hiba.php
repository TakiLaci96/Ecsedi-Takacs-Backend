<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hiba extends Model
{
    use HasFactory;

    protected $fillable = [
        "hibaMegnevezese",
        "hibaLeirasa",
        "hibaHelye",
        "hibaKepe",
        "bejelentesIdopontja",
        "hibaAllapota"
    ];

    protected $hidden = ["created_at", "updated_at"];
}
