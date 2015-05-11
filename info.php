<?php 
class Beer { 
    const NAME = 'Beer!'; 
    public static function printed(){ 
        echo 'static Beer:NAME = '. static::NAME . PHP_EOL; 
    } 
} 

class Ale extends Beer { 
    const NAME = 'Ale!'; 
    public static function printed(){ 
    	//parent::printed();
        forward_static_call(array('parent','printed')); 
        //call_user_func(array('parent','printed')); 

        //forward_static_call(array('Beer','printed')); 
        //call_user_func(array('Beer','printed')); 
    } 
} 

Ale::printed(); 
echo '</pre>'; 
?>