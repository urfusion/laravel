<?php namespace App;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Gallery extends Model   {
 
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'gallerys';

          public function User()
    { 
        return $this->belongsTo('App\User');
    }
     
        
	   public function Procuct()
    {     
             return $this->hasManyThrough('App\Shop', 'App\Procuct','shop_id','id');
              
    }
    
       public function Subuser()
    {     
             return $this->belongsTo('App\User','sub_user_id','id');
              
    }
    

}
