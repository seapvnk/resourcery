<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'content', 'duration', 'type'];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function did()
    {
        return $this->belongsToMany(User::class, 'todos');
    }
}
