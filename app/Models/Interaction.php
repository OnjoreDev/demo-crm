<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Interaction extends Model
{
    use HasFactory;
    //fillable
    protected $fillable = [
        'customer_id',
        'type',
        'notes',
        'interaction_date',
    ];
    //relationship with customer
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
