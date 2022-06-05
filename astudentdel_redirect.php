<?php
$insert = false;
include('connection.php');
if(isset($_POST['usn'])){
include('connection.php');
//collect post variable
$usn = $_POST['usn'];
$name = $_POST['name'];
$sql = "DELETE FROM student WHERE usn='$usn';";

 // Execute the query
 if($conn->query($sql) == true){
    // echo "Successfully inserted";

    // Flag for successful insertion
    $insert = true;
}
else{
    echo "ERROR: $sql <br> $conn->error";
}

// Close the database connection
$conn->close();

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap');
        </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Remove Student</title>
    <div class="mnu" style="text-align:right">
        <a href="admin.php" style="text-decoration:none; color: white; font-family: 'Open Sans', sans-serif; font-weight:bold; padding: 12px 12px 12px 12px;">Dashboard</a>
        <a href="login.php" style="text-decoration:none; color: white; font-family: 'Open Sans', sans-serif; font-weight:bold; padding: 12px 12px 12px 12px;">Logout</a>
    </div>
</head>
<style>
    body{
        background-image: url(/proj/bg1.png);
        background-color: #00bfa5;
        /* background-position: left; */
        background-repeat: no-repeat;
        background-size: cover;
        text-decoration: none;
        font-family: 'Open Sans', sans-serif;
        padding: 10px 10px 10px 10px;
        
    }
    a:hover{
        background-color: rgb(220, 220, 222);
          opacity: 100%;
          border-radius: 7px;
      }
    .para{
        text-align:center;
        font-size: 1.2em;
        font-style: normal;
        font-weight: bolder;
        color: rgb(15, 4, 77);
        padding-top: 60px;
    }
    .iform{
        text-align:left;
        color: rgb(15, 4, 77);
        font-weight: bold;
        padding-left: 43%;
        padding-right: 39%;
        box-shadow: 10px;
        
    }
    input{
        padding: 7px 7px 7px 7px;
        border-radius: 4px;
        background-color: rgb(241, 237, 236);
      }
      input:hover{
        background-color: rgb(220, 220, 222);
      }
      input:active{
          background-color: rgb(175, 170, 170);
      }
      

      #submit{
		background: rgb(0, 2, 43);
        border: 1px solid rgba(0, 0, 0, 0.1);
        padding: 7px 81px 7px 81px;
        font-size: 20px;
        border-radius: 3px;
        cursor: pointer;
        margin-top: 10px;
        color: whitesmoke;
        -webkit-box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1),
          0 2px 4px -1px rgba(0, 0, 0, 0.06);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1),
          0 2px 4px -1px rgba(0, 0, 0, 0.06);
	  }
	  #submit:hover{
		  background-color: rgba(9, 3, 63);
	  }
	  #submit:active{
		background-color: rgba(9, 3, 63);
	  }
	  @media screen and (max-width: 600px) {
		  body{
			  padding: 0px;
			  margin: 0px;
			  background-color: white;
			  background-image: none;
			  font-size: smaller;
		  }
		  .mnu{
			  text-align: left;
			  display: flex;
		  }
		  img{
			  width: 50px;
		  }
		  section{
			  float: left;
			  display: inline;
		  }
		  input{
			  size: 15;
		  }
		  form{
			  text-align: left;
		  }
		  
	  }
      header{
		  float: left;
		  width: 50px;
	  }
	  img{
		  width: 200px;
		  /* display: flex; */
		 /* padding-left: 645px;  */
	  }
      .submitMsg{
        font-style: italic;
            color: rgb(143, 221, 25);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size:smaller;
            font-weight: normal;
    }
</style>
<body>
    <header>
		<img src="/proj/jssate.png" alt="jss logo">
	</header>
    <section class="mn">
        <div class="para">
            <p style="text-align: left;">Remove Student here.....</p>
        </div>
        <div class="oform">
            <form action="" method="post">
                <div class="iform">
                <?php
        if($insert == true){
        echo "<p class='submitMsg'>Student $usn is removed</p>";
        }
    ?>
                <div style="padding-top:10px; display:block;">
                    <p style="font-size: large;">Enter Student details to remove<p>
                    <label for="">Student USN</label></br>
                <input type="USN" name="usn" placeholder="Enter student usn" autofocus size="27"></br>
                </div>
        
                <div style="padding-top:1px">
                    <label for="">Name</label></br>
                <input type="name" name="name" placeholder="Enter student name" size="27"></br>
                </div>
        
                
            </br>
            <input type="submit" value="submit" id="submit">
            </div>
                
            </form>
        </div>
    </section>
</body>
</html>