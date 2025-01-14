<?php

namespace App\Models;

use Abbasudo\Purity\Traits\Filterable;
use Abbasudo\Purity\Traits\Sortable;
use Abbasudo\Purity\Traits\withData;
use Database\Factories\LeadFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class Lead extends Model
{
    use Filterable ,HasFactory ,Notifiable, Sortable , withData;

    protected $table = 'leads';

    protected $fillable = [
        'customer_id',
        'lead_source',
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
            'lead_source' => 'string',
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
    protected static function newFactory()
    {
        return LeadFactory::new();
    }
}
