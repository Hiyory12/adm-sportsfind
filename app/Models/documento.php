<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cliente_id',
<<<<<<< HEAD
        'titular',
        'numero',
        'foto',
        'plano',
=======
        'numero',
        'categoria_id'
>>>>>>> 173d9a457c8d8efb67b5573996a4a010fdfd87d9
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
