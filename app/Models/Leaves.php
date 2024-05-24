<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leaves extends Model
{
    use HasFactory;

    protected $table = 'pigeon_leaves';
    protected $primaryKey = 'id';
    protected $fillable = [
        'pigeon_id',
        'description',
        'date',
        'created_at',
        'updated_at'
    ];

    public function pigeons()
    {
        return $this->belongsTo(Pigeons::class, 'pigeon_id');
    }
}
