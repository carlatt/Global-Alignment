<?php
/**
 * Created by PhpStorm.
 * User: carlo
 * Date: 27/03/17
 * Time: 3.35
 */

include_once "GlobalAlignmentComputator.php";
include_once "MatrixMaker.php";
include_once "DBCreator.php";
include_once "iostream.php";
//Uncomment these files if you want to create custom Symmetric Matrix or DataBases with custom Alphabet.

iostream::Output("Welcome.\n\n");
do{
    iostream::Output("0 => Global Alignment Computator\n1 => Random Data Base Creator\n2 => Symmetric Matrix Maker\n3 => Exit\n");
    $switch=iostream::Input();
    if ($switch!=3){
        switch($switch){
            case 0:
                GlobalAlignmentComputator::Run();
                break;
            case 1:
                DBCreator::Run();
                break;
            case 2:
                MatrixMaker::Run();
                break;
        }
    }else{
        iostream::Output("See you! :D\n");
        }

}while($switch!=3);

