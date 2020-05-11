<?php


namespace App;


use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class UserType extends Eloquent
{
	protected $connection = 'mongodb';
	protected $collection = 'UserType';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];
}