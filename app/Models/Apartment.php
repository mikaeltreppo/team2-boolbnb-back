<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'cover_image',
        'price',
        'description',
        'address',
        'beds',
        'bathrooms',
        'bedrooms',
        'size_m2',
        'available',
        'visible',
        'user_id',
        'facility_id',
        'longitude',
        'latitude',
        'city',
        'country'
        
    ];

    use HasFactory;
    public function sponsorships()
    {
        return $this->belongsToMany(Sponsorship::class)
            ->withPivot('start_date', 'expired_at');
    }
    public function facilities()
    {
        return $this->belongsToMany(Facility::class);
    }
    public function views()
    {
        return $this->hasMany(View::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function apartment_sponsorship()
    {
        return $this->belongsToMany(Sponsorship::class);
    }
}