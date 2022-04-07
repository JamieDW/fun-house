<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Shift extends Pivot
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'start_time', 'end_time'];

    /**
     * Get the rota that owns the Shift
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rota(): BelongsTo
    {
        return $this->belongsTo(Rota::class);
    }

    /**
     * Get the staff that owns the Shift
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function staffs(): BelongsTo
    {
        return $this->belongsTo(Staff::class);
    }
}
