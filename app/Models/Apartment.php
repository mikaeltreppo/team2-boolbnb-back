<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;
    public function sponsorships(){
        return $this->belongsToMany(Sponsorship::class);
    }
   /* public function user(){
        return $this->belongsTo(User::class);    da verificare se funziona senza
    }*/
}
