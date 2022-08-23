<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Course;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = [
        'id', 'name','phoneNo'
      ];

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    
}
