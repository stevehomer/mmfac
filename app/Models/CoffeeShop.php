<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoffeeShop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'address', 'town', 'postcode', 'lat', 'lng',
        'description', 'website', 'phone', 'google_place_id',
        'rating', 'has_wifi', 'has_outdoor', 'dog_friendly',
        'hot_food', 'accessible', 'opening_hours', 'is_active',
    ];

    protected $casts = [
        'has_wifi' => 'boolean',
        'has_outdoor' => 'boolean',
        'dog_friendly' => 'boolean',
        'hot_food' => 'boolean',
        'accessible' => 'boolean',
        'is_active' => 'boolean',
        'lat' => 'float',
        'lng' => 'float',
        'rating' => 'float',
    ];

    public function meetupRequests()
    {
        return $this->hasMany(MeetupRequest::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeSearch($query, $term)
    {
        return $query->where(function ($q) use ($term) {
            $q->where('name', 'like', "%{$term}%")
              ->orWhere('town', 'like', "%{$term}%")
              ->orWhere('postcode', 'like', "%{$term}%")
              ->orWhere('address', 'like', "%{$term}%");
        });
    }

    public function getAmenitiesAttribute(): array
    {
        $amenities = [];
        if ($this->has_wifi) $amenities[] = ['icon' => '📶', 'label' => 'Wi-Fi'];
        if ($this->has_outdoor) $amenities[] = ['icon' => '🌿', 'label' => 'Outdoor'];
        if ($this->dog_friendly) $amenities[] = ['icon' => '🐕', 'label' => 'Dogs'];
        if ($this->hot_food) $amenities[] = ['icon' => '🍳', 'label' => 'Hot food'];
        if ($this->accessible) $amenities[] = ['icon' => '♿', 'label' => 'Accessible'];
        return $amenities;
    }
}
