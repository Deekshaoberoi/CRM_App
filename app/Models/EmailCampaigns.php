<?php

namespace App\Models;

use Abbasudo\Purity\Traits\Filterable;
use Abbasudo\Purity\Traits\Sortable;
use Abbasudo\Purity\Traits\withData;
use Database\Factories\EmailCampaignFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class EmailCampaign extends Model
{
    use Filterable ,HasFactory ,Notifiable, Sortable , withData;

    protected $table = 'email_campaigns';

    protected $fillable = [
        'name',
        'subject',
        'content',
        'status',
        'scheduled_date',
        'created_by',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected function casts(): array
    {
        return [
            'name' => 'string',
            'subject' => 'string',
            'content' => 'string',
            'status' => 'string',
            'scheduled_date' => 'datetime',
            'created_by' => 'integer',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /*
    |--------------------------------------------------------------------------
    | Factory
    |--------------------------------------------------------------------------
    */
    protected static function newFactory()
    {
        return EmailCampaignFactory::new();
    }
}
