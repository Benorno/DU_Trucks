<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Trucks;

class Subunits extends Model
{
    use HasFactory;

    protected $fillable = [
        'main_truck',
        'subunit',
        'start_date',
        'end_date',
    ];

    public function truck()
    {
        return $this->belongsTo(Trucks::class, 'main_truck', 'id');
    }
}
