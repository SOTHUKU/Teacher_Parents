<?php


namespace App;


use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Feedback extends Eloquent
{
	protected $connection = 'mongodb';
	protected $collection = 'Feedbacks';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'studentId','homeworkId','teacherId','feedback'
    ];
}