<?php


namespace App;


use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Parents extends Eloquent
{
	protected $connection = 'mongodb';
	protected $collection = 'Parents';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'title', 'firstName', 'lastName','dob','address','postCode','area','studentId','userId'
    ];
}