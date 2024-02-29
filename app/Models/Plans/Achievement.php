<?php

namespace App\Models\Plans;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'year', 'indicator_id'];

    public function indicator() {
        return $this->belongsTo(Indicator::class);
    }
}
