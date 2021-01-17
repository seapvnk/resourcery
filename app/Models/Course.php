<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class, 'course_tag');
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function totalTime()
    {
        return $this->sections->reduce(function($total, $current) {
            return $total + $current->totalTime();
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

    public function totalLessons()
    {
        return $this->sections->reduce(function($total, $current) {
            return $total + $current->countVideoLessons();
        });
    }

    public function countReadings()
    {
        return $this->sections->reduce(function($total, $current) {
            return $total + $current->countReadings();
        });
    }

}
