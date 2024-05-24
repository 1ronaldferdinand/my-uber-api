<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pigeons extends Model
{
    use HasFactory;

    protected $table = 'pigeons';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'speed',
        'range',
        'cost',
        'downtime',
        'maximum_weight',
        'created_at',
        'updated_at',
    ];
}
