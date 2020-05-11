<?php


namespace App;


use Jenssegers\Mongodb\Eloquent\Model;


class Homework extends Model
{
	protected $connection = 'mongodb';
	protected $collection = 'homeworks';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'courseId', 'teacherId','studentId','title','description','dueDate','grade','comment','status','created_at'
    ];

    public function course(){
        return $this->belongsTo(Course::class);

    }
}