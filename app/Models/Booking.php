<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'church_id',
        'date',
        'slot_id',
        'name',
        'date_of_birth',
        'date_of_wedding'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'date' => 'date',
            'date_of_birth' => 'date',
            'date_of_wedding' => 'date',
        ];
    }
}
