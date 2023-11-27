<?php

namespace App\Models;

use App\Models\Trucks;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subunits extends Model
{
    use HasFactory;

    protected $fillable = [
        'main_truck',
        'subunit',
        'status',
        'start_date',
        'end_date',
    ];

    public function truck()
    {
        return $this->belongsTo(Trucks::class, 'main_truck', 'id');
    }

    public function mainTruck()
    {
        return $this->belongsTo(Trucks::class, 'main_truck');
    }

    public function subunitTruck()
    {
        return $this->belongsTo(Trucks::class, 'subunit');
    }
}
