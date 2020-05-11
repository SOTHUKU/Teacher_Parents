<?php


namespace App;


use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Message extends Eloquent
{
	protected $connection = 'mongodb';
	protected $collection = 'Messages';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'userId','title','message','status','recepient'
    ];
}