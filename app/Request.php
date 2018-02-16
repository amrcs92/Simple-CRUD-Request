<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = ['user_id', 'request_type_id', 'status'];

    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function request_type(){
        return $this->belongsTo('App\RequestType', 'request_type_id', 'id');
    }
}
