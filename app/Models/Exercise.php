<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    protected $casts = [
        'muscles' => 'array',
    ];

    protected $fillable = [
        'name',
        'muscles',
        'size',
        'type_id',
    ];

    public static function getMuscles()
    {
        return [
            'Abductors',
            'Abs',
            'Adductors',
            'Biceps',
            'Calves',
            'Chest',
            'Forearms',
            'Front Delts',
            'Glutes',
            'Hams',
            'Lats',
            'Lower Back',
            'Quads',
            'Rear Delts',
            'Side Delts',
            'Traps',
            'Triceps',
            'Upper Back',
        ];
    }

    public function plans()
    {
        return $this->belongsToMany(Plan::class);
    }

    public function sets()
    {
        return $this->hasMany(Set::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function workouts()
    {
        return $this->belongsToMany(Workout::class)
            ->withPivot('notes')
            ->withTimestamps();
    }
}
