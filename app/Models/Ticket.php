<?php

namespace App\Models;

use Abbasudo\Purity\Traits\Filterable;
use Abbasudo\Purity\Traits\Sortable;
use Abbasudo\Purity\Traits\withData;
use Database\Factories\TicketFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class Ticket extends Model
{
    use Filterable ,HasFactory , Notifiable , Sortable , withData;

    protected $table = 'tickets';

    protected $fillable = [
        'customer_id',
        'subject',
        'description',
        'priority',
        'status',
        'assigned_to',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected function casts(): array
    {
        return [
            'customer_id' => 'integer',
            'subject' => 'string',
            'description' => 'string',
            'priority' => 'string',
            'status' => 'string',
            'assigned_to' => 'integer',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function assignedTo(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Factory
    |--------------------------------------------------------------------------
    */
    protected static function newFactory(): Factory
    {
        return TicketFactory::new();
    }
}
