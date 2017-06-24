<?php
/**
 * Created by PhpStorm.
 * User: carlo
 * Date: 26/03/17
 * Time: 12.21
 */

include_once "iostream.php";
include_once "Matrix.php";

class MatrixMaker
{
    public static function Run(){
        iostream::Output("Welcome to Symmetric Matrix Maker\n\n");

        do {

            iostream::Output("\nInsert alphabet (example: ATCG) ('!' is the exit character): ");
            $alphabet=iostream::Input()."-";

            if ($alphabet!=="!-"){
                iostream::Output("Insert file in wich the matrix will be put (example: matrix.txt): ");
                $file=iostream::Input();

                iostream::Output("\nInsert Values:\n");
                $matrix=array(array());
                for ($i=0; $i<(strlen($alphabet)-1);$i++){
                    for ($j=0;$j<=$i;$j++){
                        iostream::Output("Element ".$i." ".$j.": ");
                        $matrix[$i][$j]=iostream::Input();
                        $matrix[$j][$i]=$matrix[$i][$j];
                    }
                }
                for ($i=(strlen($alphabet)-1); $i<strlen($alphabet);$i++){
                    for ($j=0;$j<=$i;$j++){
                        $matrix[$i][$j]=0;
                        $matrix[$j][$i]=$matrix[$i][$j];
                    }
                }

                $matrixWriter=new Matrix($file);
                $matrixWriter->WriteMatrixOnFile($alphabet, $matrix);
                iostream::Output("A matrix has been saved in ".$file." based on the alphabet '".$alphabet."'\n");
            }
        }while($alphabet !== "!-");

        iostream::Output("See you! :D\n");
    }
}
?>