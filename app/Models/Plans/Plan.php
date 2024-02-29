<?php

namespace App\Models\Plans;

use Illuminate\Support\Str;
use App\Models\Plans\TypePlan;
use Illuminate\Support\Carbon;
use App\Models\Support\Sector;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sector_id',
        'type_plan_id',
        'initial_year',
        'final_year',
        'status',
        'mission',
        'vision',
    ];


    protected function plan(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => [
                'plan' => Str::upper($value) . ' ' . $this->initial_year . ' - ' . $this->final_year
            ],
        );
    }

    public function setInitialYearAttribute($value)
    {
        $this->attributes['initial_year'] = $value;
        $this->attributes['final_year'] = $value + 4;
    }

    public function search($filter = null)
    {
        $result = $this->where('plan', 'ILIKE', "%$filter%")->paginate(25);
        return $result;
    }

    /*
    recuperando o setor de um plano
    */
    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }

    /*
    recuperando os tipos de planos
    */
    public function type_plan()
    {
        return $this->belongsTo(TypePlan::class);
    }

    /*
    recuperando as perspectivas dos planos
    */
    public function perspectives()
    {
        return $this->belongsToMany(Perspective::class);
    }
    /*
    recuperando os objetivos dos planos
    */
    public function objectives()
    {
        return $this->hasMany(Objective::class);
    }
}
