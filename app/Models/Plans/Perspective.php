<?php

namespace App\Models\Plans;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perspective extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'plan_id'];

    public function plans() {
        return $this->belongsToMany(Plan::class);
    }

}
