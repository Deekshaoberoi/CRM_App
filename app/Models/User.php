<?php

namespace App\Models;

use Abbasudo\Purity\Traits\Filterable;
use Abbasudo\Purity\Traits\Sortable;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Spatie\LaravelData\withData;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use Filterable,HasFactory , Notifiable , Sortable , withData;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected function casts(): array
    {
        return [
            'name' => 'string',
            'email' => 'string',
            'password' => 'string',
            'phone' => 'string',
        ];
    }
    /*
    |--------------------------------------------------------------------------
    | Relatons
    |--------------------------------------------------------------------------
    */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class)
            ->using(RoleUser::class)
            ->withPivot('team_id');
    }
    /*
    |--------------------------------------------------------------------------
    | Factory
    |--------------------------------------------------------------------------
    */
    protected static function newFactory(): Factory
    {
        return UserFactory::new();
    }
}
