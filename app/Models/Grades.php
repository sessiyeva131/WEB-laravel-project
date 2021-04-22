<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grades extends Model
{
    use HasFactory;
    protected $fillable = ['student_id', 'work_name', 'grade'];

    public function students(){
        return $this->belongsTo(Students::class);
    }
}
