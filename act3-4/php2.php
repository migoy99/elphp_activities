<?php 
// create a function that will return square root of every number from
// 1 - n. function should return array. 

    function returnSquare($n){
        $num = [];
        for($i=1;$i<=$n;$i++){   
            $sqrt = sqrt($i);
            array_push($num, number_format((float) $sqrt, 2, '.'));
        }
        return $num;
    }

    // function returnSquareRecursive($i){
    //     $arr = [];
    //     if ($i < 0) {
    //         return -1;
    //     }
    //     if ($i == 1) {
    //         return 1;
    //     }
    //     $sq = sqrt($i);
    //     array_push($arr, number_format((float) $sq, 2, '.'));
    //     return returnSquareRecursive($i - 1);
    // }


    $squaredValue = json_encode(returnSquare(16));
    // $returnSquareRecur = json_encode(returnSquareRecursive(16));

    echo "{$squaredValue} <br>";
    // echo $returnSquareRecur;
    
    $count = 1;
    foreach($asdasd = returnSquare(16) as $ass) {
        echo "Square Root of {$count}: {$ass} <br>";
        $count++;
    }

    $x = 10;

    $x+=5;

    echo $x;

?>
