<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_reference',
        'name',
        'email',
        'phone',
        'once_id',
        'ticket_tier',
        'tier_label',
        'quantity',
        'total_price',
        'currency',
        'gate',
        'section',
        'seats',
        'payment_method',
    ];
}
