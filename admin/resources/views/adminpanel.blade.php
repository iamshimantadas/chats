<?php

   $host=env('DB_HOST');
   $user=env('DB_USERNAME');
   $pass=env('DB_PASSWORD');
   $db=env('DB_DATABASE');

   $conn = mysqli_connect($host,$user,$pass,$db) or die("Database Error");

  $sql = "SELECT DISTINCT queries,dates FROM chathistory ORDER BY enrollno DESC LIMIT 15";  
  $query = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

<style>
body {
  margin: 0;
  font-family: "Lato", sans-serif;
}

.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}
 
.sidebar a.active {
  background-color: rgb(7, 53, 141);
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
</style>
<style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>

</head>
<body>

<div class="sidebar">
  <a class="active" href="#">Home</a>
   <a  href="{{url('/')}}/chathistory"><i class="bi bi-clock-fill"></i> Chat history</a>
  <a href="{{url('/')}}/insertChat&Reply"><i class="bi bi-file-earmark-plus-fill"></i> Insert new chat</a>
  <a href="{{url('/')}}/updatechat"><i class="bi bi-brush-fill"></i> Update chat</a>
  <a href="{{url('/')}}/FindToUpdate"><i class="bi bi-binoculars-fill"></i> Find chat to update</a>
  <a href="{{url('/')}}/FindToDelete"><i class="bi bi-clipboard2-x-fill"></i> Find chat to delete</a>
  <a href="{{url('/')}}/logout"><i class="bi bi-person-fill-exclamation"></i> Logout</a>
  
  
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  
  <a href="" style="font-size: 15px;">maintained by  
    <br>
    Author: Shimanta Das
  </a>
  <a href="https://microcodes.in/" style="color:blue;">microcodes.in</a>
</div>

<div class="content">
  <h2>Welcome admin!!</h2>
  <p>
    Here, is an overview of last 10-15 chats ...
<br>
<br>


<div style="overflow-x:auto;">
  <table>

    <tr>
      <th>Queries</th>
      <th>Date</th>
    </tr>
    <?php 
    while($row = mysqli_fetch_assoc($query)){
    ?>
    <tr>
      <td><?php echo $row['queries']; ?></td>
      <td><?php echo $row['dates']; ?></td>
    </tr>
    <?php    
    }
    ?>
   
  </table>
</div>

</p>
</div>

</body>
</html>
