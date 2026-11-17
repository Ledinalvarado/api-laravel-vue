<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'city',
        'email',
        'status'
    ];

    // Una empresa tiene muchos proyectos
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
