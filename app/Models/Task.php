<?php

namespace App\Models;

use Abbasudo\Purity\Traits\withData;
use Abbasudo\Purity\Traits\Filterable;
use Abbasudo\Purity\Traits\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Database\Factories\TaskFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory ,Filterable , Sortable , Notifiable , withData;

    protected $table = 'tasks';

    protected $fillable = [
        'name',
        'description',
        'due_date',
        'status',
        'assigned_to',
        'related_to',
        'related_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected function casts(): array
    {
        return [
            'name' => 'string',
            'description' => 'string',
            'due_date' => 'date',
            'status' => 'string',
            'assigned_to' => 'integer',
            'related_to' => 'string',
            'related_id' => 'integer',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    /*
    |--------------------------------------------------------------------------
    | Factory
    |--------------------------------------------------------------------------
    */
    protected static function newFactory(): Factory
    {
        return TaskFactory::new();
    }
}
