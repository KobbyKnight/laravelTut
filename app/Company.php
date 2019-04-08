<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $fillable = [
    	'name',
    	'description',
    	'user_id',
    	
    ];


public function user(){
	return $this->belongsTo('App\Models\User');
}

public function projects(){
	return $this->hasMany('App\Project');
}

public function commentable(){
	return $this->morphMany('App\Comment','commentable');
}

}
 