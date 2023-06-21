<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    use HasFactory;
    public function apartments()
    {
        return $this->belongsToMany(Apartment::class)
            ->withPivot('start_date', 'expired_at');
    }
}