<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\musik;

class Jual extends Model
{
    protected $table = 'juals';
    public function musik() 
    {
        return $this->hasMany(musik::class);
    }
}
