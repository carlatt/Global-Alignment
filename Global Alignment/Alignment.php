<?php
/**
 * Created by PhpStorm.
 * User: carlo
 * Date: 26/03/17
 * Time: 13.23
 */

include_once "Matrix.php";
include_once "FileStream.php";
include_once "iostream.php";

class Alignment
{
    public static function Run($InputString, $DBfile, $MatrixFile){
        $matrix=new Matrix($MatrixFile);
        $control=$matrix->ReadMatrixFromFile();
        if ($control==TRUE){
            $fromfile=FileStream::ReadFromFile($DBfile);
            $time=array();
            $scores=array();
            $start = microtime(true);
            foreach($fromfile as $item){
                $support=$InputString;
                for ($i=0;$i<strlen($item);$i++){
                    $support="-".$support;
                }
                $linescore=NULL;
                $maxfreezescore=NULL;
                do{
                    $score=NULL;
                    $support=substr($support, 1);
                    $startalignment=microtime(true);
                    if (strlen($support)<strlen($item)){
                        for($i=0;$i<strlen($support);$i++){
                            $score=$matrix->get($support[$i],$item[$i])+$score;
                        }
                    }
                    else{
                        for($i=0;$i<strlen($item);$i++){
                            $score=$matrix->get($support[$i],$item[$i])+$score;
                        }
                    }
                    //freezescore
                    $maxfreezescore=max($maxfreezescore,$score);
                    $time[] = microtime(true) - $startalignment;
                }while(strlen($support)>1);
                //$linescore
                $linescore=max($linescore,$maxfreezescore);
                $scores[]=$linescore;
            }
        }
        $k=NULL;
        $l=NULL;
        for ($i=0;$i<count($scores);$i++){
            if($scores[$i] > $l){
                $k=$i;
                $l=$scores[$i];
            }
        }
        $end = microtime(true) - $start;
        return "Most similar sequence: ".$fromfile[$k]."\n\nScore:".$scores[$k]."\n\nAlignment time: ".$time[$k]."\n\nTotal algorithm computation time: ".$end."\n\n";
    }
}