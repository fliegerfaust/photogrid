<?php namespace Service\Api\Models;

use Model;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\UserTrait;
use Hash;

/**
 * ApiUser Model
 */
class ApiUser extends Model implements UserInterface
{
    use UserTrait;

    protected $table = 'api_users';

    protected $hidden = array('password');

    public function setPasswordAttribute($value) 
    {
        $this->attributes['password'] = Hash::make($value);
    }

    // public function tokens()
    // {
    //     return $this->hasMany('ApiToken');
    // }

    public $hasMany = [
        'tokens' => ['Cloudservice\Api\Models\ApiToken']
    ];
    
}