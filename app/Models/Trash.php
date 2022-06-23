<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trash extends Model
{
    use HasFactory;
    
    public function data()
    {
        return $this->hasMany(Data::class);
    }

    protected $fillable = [
        'node_number',
        'location',
        'maps'
    ];
}
