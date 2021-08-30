<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'department';

    protected $fillable = [
        'department',
    ];

    public function emplyes()
    {
        return $this->hasMany(Employe::class, 'department_id');
    }
}
