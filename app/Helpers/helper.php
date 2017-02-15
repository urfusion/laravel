<?php

namespace App\Helpers;
use App\User;
class Helpers{
public static function myCustomHelper(){
    return "Im a custom helper";
}
public static function userlist(){
    return $user = User::find(all);;
}


} 
 
