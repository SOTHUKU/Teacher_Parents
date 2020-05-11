<?php


namespace App;


use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Student extends Eloquent
{
	protected $connection = 'mongodb';
	protected $collection = 'Students';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName', 'lastName','dob','email','address','postCode','area','userId','parentId'
    ];
}