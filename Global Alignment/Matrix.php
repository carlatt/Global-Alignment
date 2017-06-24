<?php

/**
 * Created by PhpStorm.
 * User: carlo
 * Date: 25/03/17
 * Time: 16.05
 */
include_once "FileStream.php";

class Matrix
{
    private $squareMatrix=array(array());
    private $alphabettoindex=array();
    private $referenceFile = "";

    /**
     * Matrix constructor.
     * @param $InWichFileAreTheValues
     */
    public function __construct($InWichFileAreTheValues){
        $this->referenceFile=$InWichFileAreTheValues;
    }


    /**
     * @param array $matrix
     */
    public function SetSquareMatrix(array $matrix){
        $this->squareMatrix=$matrix;
    }

    /**
     * @param $Alphabet
     * @param array $SqMatrix
     */
    public function WriteMatrixOnFile($Alphabet, array $SqMatrix){
        if(file_exists($this->referenceFile)){
            unlink($this->referenceFile);
        }
        if(is_string($Alphabet)){
            $alph=str_split($Alphabet);
        }
        else{
            $alph=$Alphabet;
        }
        foreach($SqMatrix as $c){
            $fantoccio=array();
            foreach ($c as $value){
                $fantoccio[]=$value;
            }
            FileStream::WriteOnFile($fantoccio, $this->referenceFile,"|");
        }
        FileStream::WriteOnFile($alph, $this->referenceFile,"|");
        $this->ReadMatrixFromFile($this->referenceFile);
    }


    /**
     * @return bool
     */
    public function ReadMatrixFromFile(){
        if (file_exists($this->referenceFile)){
            $fromfile=FileStream::ReadFromFile($this->referenceFile);
            $keys=explode("|", $fromfile[count($fromfile)-1]);
            $keys=array_flip($keys);
            unset($fromfile[count($fromfile)-1]);
            foreach ($fromfile as $item=>$value){
                $fromfile[$item]=explode("|", $value);
            }
            $this->alphabettoindex=$keys;
            $this->squareMatrix=$fromfile;
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    /**
     * @param $i
     * @param $j
     * @return mixed
     */
    public function get($i, $j){
        return (int) $this->squareMatrix[$this->alphabettoindex[$i]][$this->alphabettoindex[$j]];
    }
}