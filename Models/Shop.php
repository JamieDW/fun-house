<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Shop extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get all of the staffs for the Shop
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function staffs(): HasMany
    {
        return $this->hasMany(Staff::class);
    }

    /**
     * Get all of the rotas for the Shop
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rotas(): HasMany
    {
        return $this->hasMany(Rota::class);
    }
}
