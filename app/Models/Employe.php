<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;

    protected $table = 'employe';

    protected $fillable = [
    	'department_id',
        'name',
        'hourly_rate',
        'monthly_rate',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}
