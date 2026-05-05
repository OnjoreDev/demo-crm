<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;
    //whitelist fields     
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'company',
        'status',
        'notes'
    ];
    //relationship with users
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    //relationship with interactions
    public function interactions(): HasMany
    {
        return $this->hasMany(Interaction::class)->latest();
    }
}
