<?php namespace App;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
 
class shop extends Model   {
 
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'shopes';
      
        
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
    
       public function rigionsd()
    {       return $this->belongsTo('App\Region','region','id');
             //return $this->belongsTo('App\Shop', 'App\Region','region','id');
              
    }
       public function rating()
    {       return $this->belongsTo('App\Rating','rating','id','shop_id','user_id');
             //return $this->belongsTo('App\Shop', 'App\Region','region','id');
              
    }
    

}
