<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table ='students';

    protected $fillable = ['first_name','last_name','age','phone_number'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function topics()
    {
        return $this->belongsToMany(Topic::class, 'topics_students','student_id','topic_id')
            ->withPivot('score')
            ->withTimestamps();
    }
}
