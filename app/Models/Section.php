<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'order'];


    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function contents()
    {
        return $this->hasMany(Content::class);
    }

    public function totalTime()
    {
        return $this->contents->reduce(function($total, $current) {
            return $total + $current->duration;
        });
    }

    public function totalTimeInBrazilLocale()
    {

        $timestamp = $this->totalTime();

        $hours = floor($timestamp / 3600);
        $minutes = floor($timestamp % 3600 / 60);

        if ($hours == 0) {
            return "{$minutes}m";
        }

        return "{$hours}h {$minutes}m";
    }

    public function countVideoLessons()
    {
        return $this->contents()
            ->where(['type' => 'video'])
            ->count();
    }

    public function countReadings()
    {
        return $this->contents()
            ->where(['type' => 'reading'])
            ->count();
    }
}
