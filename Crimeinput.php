<!-- This is for the cop to enter any offence by the vehicle number and will contain the fields like
	1. Vehicle number
	2. Offence done
	3. Place of offence
	4. Fine to be paid
This page comes in when the cop registration is successfull-->
<!DOCTYPE html>
<html>
<head>
	<title>Offence form</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>

	<?php

		$vnoerr = $placeerr = $offerr = $finerr = "";
		$vno = $place = $off = $fin = "";
		$boo = true;
		//not null check before submit

		if($_SERVER["REQUEST_METHOD"] == "POST")
		{

			if(empty($_POST["number"]))
			{
                $vnoerr="Please Enter a Vehicle No.";
                $boo = false;
                

            }
            else{
                $vno=chngIP($_POST["number"]);
                echo $vno;
            }//vehicle no


            if(empty($_POST["place"]))
			{
                $placeerr="Please Enter the correct location";
                $boo = false;
                

            }
            else{
                $place=chngIP($_POST["place"]);
                echo $place;
            }//Place

            if(empty($_POST["offence"]))
			{
                $offerr="Please Enter the offence";
                $boo = false;
                

            }
            else{
                $off=chngIP($_POST["offence"]);
                echo $off;
            }//offence

            if(empty($_POST["fine"]))
			{
                $finerr="Please Enter The correct fine";
                $boo = false;
                

            }
            else{
                $fin=chngIP($_POST["fine"]);
                echo $fin;
            }//vehicle   
            if ($boo) {
            	$boo = chk_vno($vno);
            	if ($boo) {
            		echo("All correct");//send_data();//will send data to form if all is correct
            	}
            	else
            	{
            		 $vnoerr="Please Enter the correct Vehicle No.";
            	}

            	
            }//checks if vno is all digit in the last 4 spots or not

		}

        function chngIP($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;

        }//gives data a nice haircut

		 function chk_vno($vehicle)
		{

			$vim = substr($vehicle, -4);//extracts last four chars from string
			if(!preg_match("/^\d+$/", $vim))
			{
			
				 return false;

			}

			return true;

		}

		/*function send_data()
		{

		}*/





	?>

 <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="Homepage.html" class="navbar-brand">Police Database</a>
            </div>

            <div>
                <ul class="nav navbar-nav" style="font-size: 15px">
                    <li><a>Cop logged in</a></li>
                </ul>

            </div>
        </div>
    </nav>
<div class="basic">
	<div class="crime_input">
	<center><form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="crime_form" method="POST">
	<table class="crime" align="center" >
		<tr>
			<td><label for="uid">Vehicle number</label></td>
			<td><label for="uid">Place of offence</label></td>
			<td><label for="uid">Offence</label></td>
			<td><label for="uid">Fine</label></td>

		</tr>
	</div>
		<tr id="input">
			<td><input type="text" name="number" placeholder="Vehicle number"></td>
			<td><input type="text" name="place" placeholder="Area"></td>
			<td><input type="text" name="offence" placeholder="Offence"></td>
			<td><input type="number" name="fine" placeholder="Fine"></td>
		</tr>
		<tr id="input">
			<td><span class="error">* <?php echo $vnoerr; ?> </span></td>
			<td><span class="error">* <?php echo $placeerr; ?> </span></td>
			<td><span class="error">* <?php echo $offerr; ?> </span></td>
			<td><span class="error">* <?php echo $finerr; ?> </span></td>

		</tr>
	</table>

	<input type="submit" name="submit" align="center" onsubmit="" class="btn btn-default">
	</form></center>
</div>
</body>
</html>
