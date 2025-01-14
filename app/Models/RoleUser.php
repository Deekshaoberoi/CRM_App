<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class RoleUser extends Pivot
{
    protected $fillable = [
        'role_id',
        'user_id',
        'team_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected function casts(): array
    {
        return [
            'role_id' => 'integer',
            'user_id' => 'integer',
            'team_id' => 'integer',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Relatons
    |--------------------------------------------------------------------------
    */
    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
}
