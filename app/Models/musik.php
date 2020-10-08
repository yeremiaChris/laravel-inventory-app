<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Supplier;
use App\Models\Jual;

class musik extends Model
{
    protected $table = 'musiks';

    public function pemasok()
    {
        return $this->belongsTo(Supplier::class);
    }
    public function jual()
    {
        return $this->belongsTo(jual::class);
    }
}
