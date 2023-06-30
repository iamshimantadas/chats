<?php
// connecting to database
include 'connection.php';


// getting user message through ajax
$getMesg = mysqli_real_escape_string($conn, $_POST['text']);

//checking user query to database query
$check_data = "SELECT replies FROM botreply WHERE queries REGEXP '$getMesg'";
$run_query = mysqli_query($conn, $check_data) or die("Error");

// if user query matched to database query we'll show the reply otherwise it go to else statement
if(mysqli_num_rows($run_query) > 0){
    //fetching replay from the database according to the user query
    $fetch_data = mysqli_fetch_assoc($run_query);
    //storing replay to a varible which we'll send to ajax
    $replay = $fetch_data['replies'];
    echo $replay;
}else{
    echo "Sorry I can't understand your ask! try again please! If your query not solve, then <b>within 24 Hours we will fix that</b>! Please try after then!! ";

    // saving unresolved query into table....
    $getMesg = mysqli_real_escape_string($conn, $_POST['text']);
    $sql = "INSERT INTO `unreserved_query` (`queries`, `dates`, `msgtime`, `loc`) VALUES (?,?,?,?)";

    $query = mysqli_prepare($conn,$sql);

if ($query) {
    mysqli_stmt_bind_param($query,'ssss',$userQueries,$udate,$utime,$uloc);

    $userQueries=$_POST['text'];
    $userQueries = mysqli_real_escape_string($conn,$userQueries);
    $userQueries = htmlspecialchars($userQueries);
    $udate = date("Y-m-d");
    date_default_timezone_set("Asia/Calcutta"); 
    $utime = date("h:i:sa");
    $uloc = getenv('REMOTE_ADDR');;
    mysqli_stmt_execute($query);
}


}
?>


<?php

$INSERTSQL = "INSERT INTO `chathistory` (`queries`, `dates`, `msgtime`, `loc`) VALUES (?,?,?,?)";
$INSERTQUERY = mysqli_prepare($conn,$INSERTSQL);

if ($INSERTQUERY) {
    mysqli_stmt_bind_param($INSERTQUERY,'ssss',$userQueries,$udate,$utime,$uloc);

    $userQueries=$_POST['text'];
    $userQueries = mysqli_real_escape_string($conn,$userQueries);
    $userQueries = htmlspecialchars($userQueries);

    $udate = date("Y-m-d");
    date_default_timezone_set("Asia/Calcutta"); 
    $utime = date("h:i:sa");
    $uloc = getenv('REMOTE_ADDR');;
   
    
    mysqli_stmt_execute($INSERTQUERY);
    
   // echo "query executed!";
    
}
?>