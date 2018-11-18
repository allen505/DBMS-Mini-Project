

<!DOCTYPE html>
<html>
<head>
	<title>
		Sign up
	</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <?php
        $vhnerr = "";
        $updt="";
        if($_SERVER["REQUEST_METHOD"] == "POST")
            {

                if(empty($_POST["vhno"]))
                {
                    $vhnerr= "Please Enter a Booking Number <br>";
                }
                else
                {
                    $updt = chngIP($_POST["vhno"]);
                        
                        $servername = "127.0.0.1";
                        $username = "root";
                        $password = "";

                        // Create connection
                        $conn = mysqli_connect($servername, $username, $password);

                        // Check connection
                        if (!$conn) 
                        {
                            die("Connection failed: " . mysqli_connect_error() );
                        }
                        echo "Connected successfully";

                        $sql = "DELETE FROM /*table name*/ WHERE /*vehicle number col*/=".$updt;

                        if (mysqli_query($conn, $sql)) 
                        {
                            echo "Record deleted successfully";
                        } 

                        else 
                        {
                            echo "Error deleting record: " . mysqli_error($conn);
                        }
                    }//deleting recor here
                    
            }
    function chngIP($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;

    }
    
?>


    <div class="col-xs-12" style="height:60px;"></div>

    <div class="userForm center-block">
      <form action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "POST">
        <div class="form-group">
          <label for="vhno">Vehicle Number</label>
          <input type="text" class="form-control" id="vhno" placeholder="Enter Booking Number" name="vhno">
          <span class="error"> <?php echo $vhnerr; ?> </span>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>

</body>
</html>

