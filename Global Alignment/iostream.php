<?php

/**
 * Created by PhpStorm.
 * User: carlo
 * Date: 24/03/17
 * Time: 17.19
 */
class iostream
{
    public static function Input(){
        return rtrim(fgets(STDIN));
    }

    public static function Output($item){
        echo($item);
    }

    public static function InputMoreItems($HowManyItems){
        $input=array();                                          //it saves all the input in an array.
        for ($i=0;$i<$HowManyItems;$i++){
            $input[]=self::Input();
        }
        return $input;
    }

    public static function OutputMoreItems(array $ManyItems){
        foreach ($ManyItems as $key=>$item){                            //it lists all values in an array.
            self::Output($key."\n".$item."\n");
        }
    }
}