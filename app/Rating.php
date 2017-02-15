<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Rating extends Model
{

		protected $table = 'ratings';
                
     public function Shop()
    {     
             return $this->hasManyThrough('App\Shop', 'App\User','id','user_id');
              
    }            

     public function User()
    { 
        return $this->belongsTo('App\User');
    } 
}
