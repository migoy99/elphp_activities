<?php 
    $myBday = '09/21/1999';
    $dayBday = intval(substr($myBday, 3 , 2));

    echo ($dayBday %2 == 0) ? "{$myBday} <br>even" : "{$myBday} <br>odd";

    // if ($dayBday %2 == 0) {
    //     echo "{$myBday} <br>even";
    // } else {
    //     echo "{$myBday} <br>odd";
    // }
    
?>