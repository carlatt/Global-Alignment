<?php
/**
 * Created by PhpStorm.
 * User: carlo
 * Date: 26/03/17
 * Time: 12.51
 */

include_once "iostream.php";
include_once "RandomDBMaker.php";

class DBCreator
{
    public static function Run(){
        iostream::Output("Welcome to Random DataBase Creator\n\n");

        do{
            iostream::Output("Enter alphabet (for example: ATCG) ('!' is the exit character): ");
            $alphabet=iostream::Input();

            if ($alphabet!=="!"){
                iostream::Output("\nHow many DB do you want to create? ");
                $DBnumber=iostream::Input();

                iostream::Output("\nHow many strings? ");
                $stringnumber=iostream::Input();

                iostream::Output("\nHow long the strings? ");
                $stringlenght=iostream::Input();

                iostream::Output("\nInsert the common name for DBs (example if you enter 'a', dbs will be called a0.txt, a1.txt...): ");
                $DBname=iostream::Input();

                $DataBaseMaker=new RandomDBMaker($DBname);
                $DataBaseMaker->setAlphabet($alphabet);           //comment this line if you want to use latin alphabet as default.

                for ($i=0;$i<$DBnumber;$i++){
                    $DataBaseMaker->Create($stringlenght, $stringnumber);
                }

                iostream::Output("\nAll databases you required have been created\n");
            }

        }while($alphabet!=="!");

        iostream::Output("See you! :D\n");
    }
}


