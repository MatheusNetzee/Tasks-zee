<?php
namespace SON\DI;

class Container{

    public static function getEntity($entity){

        $class = "\\App\\Entity\\".ucfirst($entity);
        return new $class;
    }

    public static function getDao($dao){
        	
    	$class = "\\App\\Dao\\".ucfirst($dao);
    	 return new $class;
    }
}