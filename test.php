<?php

// $new_date = date("Y-m-d");
// echo "<br>";
// echo "This is date method ".$new_date;
// Return the current time as a Unix timestamp, then format it to a date:
$to_date = time();
// echo "<br>";
// echo "this is time method".$to_date;
// echo "<br>";

// $day_dif = 0;
// Parse English textual datetimes into Unix timestamps:
// $from_date = strtotime($new_date. " + $day_dif days");
// echo "this is to string method ".$from_date;
// $cur_date  = date("Y-m-d",$to_date);
// $due_date  = date("Y-m-d",$from_date);




     $now = strtotime("2021/10/26");
     $dueDate = strtotime("2021/10/27");
     echo "time stamp ". $dueDate;
     echo "<br>";
     $day = $now - $dueDate;

     // if curretn date > due date answer in plus
    // if curretn date < due date answer in minus 

    echo $day;     
    echo "<br>";       
     $fine = floor($day/(60*60*24))."\n";
    echo "<br>";
    echo $fine;  

     $cal_fine = $fine < 0 ? 0  : $fine  * 50;
     echo $cal_fine." Rs";



?>