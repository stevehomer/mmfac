<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class MeetupRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'coffee_shop_id', 'invitee_email', 'invitee_name',
        'proposed_at', 'message', 'token', 'status', 'responded_at',
    ];

    protected $casts = [
        'proposed_at' => 'datetime',
        'responded_at' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::creating(function ($model) {
            if (empty($model->token)) {
                $model->token = Str::random(48);
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function coffeeShop()
    {
        return $this->belongsTo(CoffeeShop::class);
    }

    public function isPending(): bool
    {
        return $this->status === 'pending';
    }

    public function isAccepted(): bool
    {
        return $this->status === 'accepted';
    }
}
