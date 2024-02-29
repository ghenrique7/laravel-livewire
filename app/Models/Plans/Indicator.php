<?php

namespace App\Models\Plans;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicator extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'classification',
        'polarity',
        'calc_description',
        'finality',
        'periodicity',
        'data_font',
        'base_year',
        'collect_form',
        'objective_id'
    ];

    public function search($filter = null)
    {
        $result = $this->where('indicator', 'ILIKE', "%$filter%")->paginate(25);
        return $result;
    }

    public function objective() {
        return $this->belongsTo(Objective::class);
    }

    public function achievements() {
        return $this->hasMany(Achievement::class);
    }

    public function action_plans() {
        return $this->hasMany(ActionPlan::class);
    }
}
