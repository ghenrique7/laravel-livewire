<?php

namespace App\Models\Support;

use App\Models\Plans\Plan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sector extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'abbreviation', 'city','type'];

    public function search($filter = null)
    {
        $result = $this->where('name', 'ILIKE', "%{$filter}%")
            ->orWhere('abbreviation', 'ILIKE', "%{$filter}%")
            ->paginate(10);
        return $result;
    }

    public function plans()
    {
        return $this->hasMany(Plan::class);
    }
}
