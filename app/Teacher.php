<?php


namespace App;


use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Teacher extends Eloquent
{
	protected $connection = 'mongodb';
	protected $collection = 'Teachers';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'dob','phoneNumber','address','postCode','area','position'
    ];
}