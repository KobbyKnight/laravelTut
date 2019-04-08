<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable =[
    	'name',
    	'project_id',
    	'company_id',
    	'user_id',
    	'days',
    	'hours',
    ];


    public function user(){
    	return $this->belongsTo('App\Models\User');
    }

    public function company(){
    	return $this->belongsTo('App\Models\Company');
    }

    public function project(){
    	return $this->belongsTo('App\Models\Project');
    }


    public function commentable(){
		return $this->morphMany('App\Comment','commentable');
	}
}
