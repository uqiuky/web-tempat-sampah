<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    public function trash()
    {
        return $this->belongsTo(Trash::class, 'node_number');
    }

    protected $fillable = [
        'node',
        'hcsr',
        'last_update'
    ];
}
