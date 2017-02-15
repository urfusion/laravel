<?php namespace App;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Procuct extends Model   {
 
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'products';

          public function User()
    { 
        return $this->belongsTo('App\User');
    }
     
       

}
