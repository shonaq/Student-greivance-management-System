<?php
include('connection.php');
error_reporting(0);
session_start();

        // Execute the query
        if(isset($_POST['pun'])){
          $pg=$_POST['pg'];
        //echo "$pg";
        $query3="select complaint_id from investigation where investigation_id IN (select investigation_id from punishment where punishment_given = '$pg');";
        $result3=$conn-> query($query3);
          if($conn->query($query3) == true){
            //echo "Successfully inserted";
          }
          else{
           // echo "ERROR: $query3 <br> $conn->error";
            echo "ERROR noticed";
          }
        }
        
$atype=$_SESSION["abuse_type"];
// echo "$atype";
$sql5="CALL `getPriority`('$atype');";
$res=mysqli_query($conn,$sql5);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Counsellor Profile</title>
    <div class="mnu">
      <a
        href="index.php"
        style="
          text-decoration: none;
          padding: 12px 12px 12px 12px;
          color: rgb(15, 4, 77);
        "
        >Home</a
      >
      <a
        href="acCmpList.php"
        style="
          text-decoration: none;
          padding: 12px 12px 12px 12px;
          color: rgb(15, 4, 77);
        "
        >Complaint List</a
      >
      <a
        href="login.php"
        style="
          text-decoration: none;
          padding: 12px 12px 12px 12px;
          color: rgb(15, 4, 77);
        "
        >Logout</a
      >
    </div>

    <style>
      @import url(https://fonts.googleapis.com/css?family=Open+Sans);
      .mnu {
        text-decoration: none;
        text-align: right;
        padding-right: 20px;
        padding-top: 20px;
      }
      input{
        padding: 7px 7px 7px 7px;
        border-radius: 4px;
        background-color: rgb(241, 237, 236);
      }
      input:hover{
        background-color: rgb(220, 220, 222);
      }
      a:hover {
        background-color: rgb(220, 220, 222);
        opacity: 100%;
        border-radius: 7px;
      }
      body {
        background-image: url(images_student/penpaper.jpg);
        background-size: 120%;
        background-repeat: no-repeat;
        background-position: right;
        margin: 5px;
        font-family: "Open Sans", sans-serif;
        background-color: rgb(82, 81, 81);
        color: rgb(15, 4, 77);
      }
      header{
		  float: left;
		  width: 50px;
	  }
	  img{
		  width: 200px;
		  
	  }
      table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

th{
  color: #b71c1c;
}

td{
  color: black;
}

tr:nth-child(even) {
  background-color: #e0e0e0;
}

body{
  background: #f2f2f2;
  font-family: 'Open Sans', sans-serif;
}
.search-pun{
  margin-top: 350px;
  
  padding-top: 0px;
  /* background-color: yellow; */
  width: 20%;
  padding-left: 48px;
  
  
}
a{
  text-decoration: none;
}
    </style>
  </head>
  <body>
    <main>
    <header>
        <img src="images_student/jssate.png" alt="jss logo">
      </header>
      <section>
        <div style="float: left;">
          <h1 style="padding-top: 60px;">Hi, <?php echo $_SESSION['username']; ?></h1>
      <section>
     <div style="float: left;">
     <?php
$sql2="SELECT name, gender, age, email, phno from counsellor where counsellor_id='".$_SESSION['username']."'";
$result1 =$conn-> query($sql2);

if($result1==true){
    while($row = $result1-> fetch_assoc()){
      echo "
      <table>
  <tr>
  <th>NAME</th>
  <td>".$row["name"]."</td>
  </tr>
  <tr>
  <th>GENDER</th>
  <td>".$row['gender']."</td>
  </tr>
  <tr>
  <th>AGE</th>
  <td>".$row['age']."</td>
  </tr>
  <th>YEAR</th>
  <td>".$row['email']."</td>
  </tr>
  <th>PHONE NUMBER</th>
  <td>".$row['phno']."</td>
  </tr>
  
</table>";
      }
}
else{
    echo "No data found";
}
  ?>
     
      </section>
     

     <div style="float: right; width: 5%; padding-left:400px; padding-top:0px; display:flex;">
     <table>
    <tr><th colspan="5" style="text-align: center;">COMPLAINTS ASSIGNED </th></tr>
    <tr>
      <th>INVESTIGATION_ID</th>
    <th>COMPLAINT_ID</th>
    <th>STATUS</th>
    <th>PRIORITY</th>
    <th>DELETE</th>
    <?php
$sql="SELECT * from `sgms`.`investigation` where counsellor_id='".$_SESSION['username']."'";
$result=$conn-> query($sql);

if($result == true){
    while($row = $result-> fetch_assoc()){
        echo '<tr>';
        $del=$row['investigation_id'];
        echo '<td>'.$row['investigation_id'] .'</td>';
        echo '<td>'.$row['complaint_id'] .'</td>';
        echo '<td>'.$row['status'] .'</td>';
        echo '<td>'.$row['priority'] .'</td>';
        echo "<td><a href='delete.php?del=$del'<button type='button' class='btn btn-success'>Delete</button></td>";
        echo '</tr>';
        
    }
    echo "</table>";
}
else{
    echo "No complaints assigned.";
}
 ?> 
     </div>
    </main>
 

    <div class="search-pun">
       <form action="" method="post">
         <div>
           <label for="">Enter Punishment type</label>
          <input type="text" name="pg" placeholder="Enter punishment given">
          <input type="submit" name="pun" value="Check">
         </div>
         <div>
           <table>

  <?php 
  if($result3 == true){
    echo "<tr>
    <th>Complaint ID</th> 
  </tr>";
    while($row = $result3-> fetch_assoc()){
        echo '<tr>';
        echo '<td>'.$row['complaint_id'] .'</td>';
        echo '</tr>';
        
    }
    echo "</table>";
}
else{
    echo "No pid available for this punishment type!!";
}
           ?>
         </div>
       </form>
     </div>
     
   
     







  </body>
</html>