<?php

namespace App\Models\Plans;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActionPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'indicator_id',
        'name',
        'description'
    ];

    public function indicator()
    {
        return $this->belongsTo(Indicator::class);
    }
}
