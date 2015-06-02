<?php namespace Service\Api\Models;

use Model;
use Carbon\Carbon;

/**
 * ApiToken Model
 */
class ApiToken extends Model
{
    protected $table = 'api_tokens';

    protected $fillable = ['token', 'client', 'user_id', 'expires_on'];

    public function scopeValid()
    {
        return !Carbon::createFromTimeStamp(strtotime($this->expires_on))->isPast();
    }

    // public function user()
    // {
    //     return $this->belongsTo('ApiUser','user_id');
    // }

    public $belongsTo = [
    	'user' => ['Cloudservice\Api\Models\ApiUser', 'foreignKey' => 'user_id']
    ];
    
}