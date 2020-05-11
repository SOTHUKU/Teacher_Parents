<?php


namespace App;


use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Course extends Eloquent
{
	protected $connection = 'mongodb';
	protected $collection = 'Course';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'courseName'
    ];
}