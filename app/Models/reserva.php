<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reserva extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'inicio',
        'fim',
        'valor',
        'cliente_id',
        'espaco_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'inicio' => 'datetime',
        'fim' => 'datetime',
        'valor' => 'float',
        'cliente_id' => 'integer',
        'espaco_id' => 'integer',
    ];

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }

    public function espaco(): BelongsTo
    {
        return $this->belongsTo(Espaco::class);
    }
}
