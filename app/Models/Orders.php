<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'pigeon_orders';
    protected $primaryKey = 'id';
    protected $fillable = [
        'pigeon_id',
        'code',
        'cost',
        'distance',
        'deadline',
        'created_at',
        'updated_at'
    ];

    public function pigeons()
    {
        return $this->belongsTo(Pigeons::class, 'pigeon_id');
    }
}
