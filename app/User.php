<?php


namespace App;


use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class User extends Eloquent
{
	protected $connection = 'mongodb';
	protected $collection = 'Users';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'accountId','typeId','password'
    ];
}