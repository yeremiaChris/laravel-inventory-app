<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\musik;
class Supplier extends Model
{
    protected $table = 'suppliers';

    public function musik() 
    {
        return $this->hasMany(musik::class);
    }
}
