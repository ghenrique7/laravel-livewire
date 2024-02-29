<?php

namespace App\Models\Plans;

use App\Models\Plans\Plan;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TypePlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function plans() {
        return $this->hasMany(Plan::class);
    }

    // Substitui todos os caracteres especiais e numeros por "C" no banco de ad
    protected function name(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => preg_replace('/[^a-zA-Z\- ]/', 'C', Str::upper($value)),
        );
    }
}
