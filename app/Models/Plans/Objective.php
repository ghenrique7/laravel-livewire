<?php

namespace App\Models\Plans;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objective extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'level',
        'plan_id',
        'perspective_id',
        'theme_id'
    ];

    public function search($filter = null)
    {
        $result = $this->where('objective', 'ILIKE', "%$filter%")->paginate(25);
        return $result;
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function perspective()
    {
        return $this->belongsTo(Perspective::class);
    }

    public function indicators()
    {
        return $this->hasMany(Indicator::class);
    }

    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }
}
