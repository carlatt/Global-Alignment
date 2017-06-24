<?php

/**
 * Created by PhpStorm.
 * User: carlo
 * Date: 25/03/17
 * Time: 12.00
 */
include_once "FileStream.php";

class RandomDBMaker
{
    private $alphabet="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    private $dbname="";
    private $extension=".txt";
    private $freshname=0;

    /**
     * RandomDBMaker constructor.
     * @param $nameofDB
     */
    public function __construct($nameofDB){
        $this->dbname=$nameofDB;
    }

    /**
     * @return string
     */
    public function getAlphabet(){
        return $this->alphabet;
    }

    /**
     * @param $alpha
     */
    public function setAlphabet($alpha) {
        $this->alphabet=$alpha;
    }

    /**
     * @param $stringlenght
     * @param $stringnumber
     */
    public function Create($stringlenght, $stringnumber){
        $values=array();
        $value="";
        for ($j=0;$j<$stringnumber;$j++){
            for ($i=0;$i<($stringlenght/(strlen($this->alphabet)));$i++){
                $value=str_shuffle($value.$this->alphabet);
            }
            $value=substr($value, 0, $stringlenght);
            $values[$j]=$value;
            $value="";
        }
        FileStream::OverwriteOnFile($values,($this->dbname).($this->freshname).($this->extension), "\n");
        $this->freshname++;
    }
}