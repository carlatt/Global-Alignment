<?php

/**
 * Created by PhpStorm.
 * User: carlo
 * Date: 19/03/17
 * Time: 13.42
 */
class FileStream
{
    /**
     * @param array $valori
     * @param $nomefile
     * @param $separazione
     */
    public static function WriteOnFile(array $valori, $nomefile, $separazione){
        $byte=FALSE;                                   //control byte.

        if ($separazione=="" or $separazione==" "){
            $separazione=",";                          //a separation character could not be an empty character or
        }                                              //a space character.

        $handle=fopen($nomefile, "a");                 //a file will be opened in write only mode starting from the bottom.
        $fantoccio=implode($separazione, $valori);

        while($byte==FALSE){
            $byte=fwrite($handle, $fantoccio."\n");    //if the writing on file fails it will be retried.
        }
        fclose($handle);                               //this file is closed.
    }

    /**
     * @param array $valori
     * @param $nomefile
     * @param $separazione
     */
    public static function OverwriteOnFile(array $valori, $nomefile, $separazione){
        $byte=FALSE;                                   //control byte.

        if ($separazione=="" or $separazione==" "){
            $separazione=",";                          //a separation character could not be an empty character or
        }                                              //a space character.

        $handle=fopen($nomefile, "w");                 //a file will be opened in write only mode starting from the top.
        $fantoccio=implode($separazione, $valori);

        while($byte==FALSE){
            $byte=fwrite($handle, $fantoccio."\n");    //if the writing on file fails it will be retried.
        }
        fclose($handle);                               //this file is closed.
    }

    /**
     * @param $nomefile
     * @return array
     */
    public static function ReadFromFile($nomefile){

        $returnValues=array();
        $handle=fopen($nomefile, "r");                 //the file specified in $nomefile will be opened in read only mode

        while ( !feof( $handle ) ){
            $buffer = fgets($handle);                  //the file's lines will be read one by one
            $returnValues[] = rtrim($buffer);          //and saved in an array removing the "\n" character.
        }
        fclose($handle);                               //the file is closed
        unset($returnValues[count($returnValues)-1]);
        return $returnValues;
    }
}

?>
