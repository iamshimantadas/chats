<?php
require 'connection.php';

$fname = $_POST['name'];
$phone = $_POST['phone'];
$iden = $_POST['iden'];
$enq = $_POST['enquery'];

// filter user inputs
$fname = htmlspecialchars($fname);
$phone = htmlspecialchars($phone);
$iden = htmlspecialchars($iden);
$enq = htmlspecialchars($enq);

$enq = mysqli_real_escape_string($conn,$enq);

$date = date("Y/m/d");
date_default_timezone_set("Asia/Calcutta"); 
$time = date("h:i a");;

if(!empty($fname) && !empty($phone) && !empty($iden) && !empty($enq) && !empty($date) && !empty($time))
{
    $sql = "INSERT INTO `enquiry_table` (`id`, `name`, `phone`, `usertype`, `msg`, `date`, `time`) VALUES (NULL, '$fname', '$phone', '$iden', '$enq', '$date', '$time')";

    if(mysqli_query($conn,$sql)){
        echo "Your query(message) has been forward to our admin!";
    }
    else{
        echo " Please submit your enquiry form again!! ";
    }
}
else{

}


?>