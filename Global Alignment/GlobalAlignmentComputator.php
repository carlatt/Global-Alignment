<?php

/**
 * Created by PhpStorm.
 * User: carlo
 * Date: 30/03/17
 * Time: 15.53
 */
include_once "iostream.php";
include_once "Alignment.php";
class GlobalAlignmentComputator
{
    public static function Run(){
        iostream::Output("Welcome to Global Alignment Computator.\n\n");
        do{
            iostream::Output("Insert the sequence: ('!' is the exit character)");
            $string=iostream::Input();
            if($string!=="!"){
                iostream::Output("Wich database do you want to compare?\n");
                $dbname=iostream::Input();
                iostream::Output("Wich is the filename of the matrix?\n");
                $matrix=iostream::Input();
                iostream::Output(Alignment::Run($string,$dbname,$matrix));
            }

        }while($string!=="!");
    }
}