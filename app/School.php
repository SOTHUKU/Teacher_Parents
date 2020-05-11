<?php


namespace App;


use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class School extends Eloquent
{
	protected $connection = 'mongodb';
	protected $collection = 'School';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'schoolName','address','postCode','area','phoneNumber'
    ];
}