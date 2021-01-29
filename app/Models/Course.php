<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Course extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'cover_picture_path', 'description', 'overview', 'language', 'category'];

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

    public function totalHours()
    {
        $timestamp = $this->totalTime();
        $hours = floor($timestamp / 3600);

        if ($hours == 1) {
            return "1 hora";
        } else {
            return "$hours horas";
        }
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

    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites');
    }

    public function ratedBy()
    {
        return $this->belongsToMany(User::class, 'course_rating');
    }

    public function ratings()
    {
        return $this->ratedBy()->count();
    }

    public function ratingAverage()
    {
        return $this->ratedBy()->average('rating');
    }

}
