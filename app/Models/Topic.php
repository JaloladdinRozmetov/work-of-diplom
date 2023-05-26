<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $table = 'topics';

    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function students()
    {
        return $this->belongsToMany(Student::class, 'students_topics')
            ->withPivot('score')
            ->withTimestamps();
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'topic_group','topic_id','group_id')
            ->withPivot('score')
            ->withTimestamps();
    }
}
