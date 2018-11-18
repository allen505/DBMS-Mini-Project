<?php
session_start();
?>
<!--This is where the civilian is able to view the offence he has made-->
<!DOCTYPE html>
<html>
<head>
	<title>Viewing the offence</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>

<?php
	function logoff()
	{
		session_destroy();
		header('Location: Homepage.php');
	}

?>
<nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="Homepage.html" class="navbar-brand">Police Database</a>
            </div>

            <div>
                <ul class="nav navbar-nav" style="font-size: 15px">
                    <li><a>Civilian viewing</a></li>
                </ul>

            </div>
        </div>
    </nav>
   <div class="view">
		<table align="center" class="table">
			<tr>
				<td><label for="uid">Vehicle number</label></td>
				<td><label for="uid">Place of offence</label></td>
				<td><label for="uid">Offence</label></td>
				<td><label for="uid">Reference id</label></td>
			</tr>
				<div class="Display">
					<?php

						$servername = "localhost";
						$username = "username";
						$password = "password";
						$dbname = "myDB";
						$gadno = $_SESSION["vhn"];

						// Create connection
						$conn = mysqli_connect($servername, $username, $password, $dbname);
						// Check connection
						if (!$conn) {
						die("Connection failed: " . mysqli_connect_error());
						}

						$sql = "SELECT /*enter the rows you need*/ FROM /*table*/ WHERE/* column for vehicle number*/=". $gadno ;
						$result = mysqli_query($conn, $sql);

						if (mysqli_num_rows($result) > 0) {
						// output data of each row
						while($row = mysqli_fetch_assoc($result)) {
						    echo "<tr><td>". $row["/*vehicle no row*/"]."</td><td>". $row["#placeofoffencerow"]."</td><td>". $row["#offence"]."</td><td>". $["#refid"]. "</td></tr>";
						}
						} else {
						echo "No Dues";
						}

						

						mysqli_close($conn);
					?>
				</div>
			
		</table>
		<center><button class="btn btn-default" action = "<?php echo htmlspecialchars(logoff());?>" >Log out</button></a></center>   	
   </div>
</body>
</html>