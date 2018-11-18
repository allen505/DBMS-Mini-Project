<!-- This will have the option for the cop to sign in and a button if the cop wants to register himself-->
<!DOCTYPE html>
<html>
<head>
	<title>Cop sign in</title>
    <link rel="stylesheet" type="text/css" href="main.css">
    <style type="text/css">
        .error{ color: red; }
    </style>
</head>

<body>

    <!-- php for making sure null is not entered-->
    <?php

        $servername = "127.0.0.1";
        $username = "root";
        $password = "";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        echo "Connected successfully";

        //not null eval
        $uiderr=$pswderr="";
        $uid=$pswd="";
        $boo= true;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(empty($_POST["uid"])){
                $uiderr="Please enter a valid User ID";
                $boo = false;
                

            }
            else{
                $uid=chngIP($_POST["uid"]);
                echo $uid;
            }

            if(empty($_POST["password"])){
                $pswderr="Please enter a password";
                $boo = false;

                //echo $uiderr;

            }
            else{
                $pswd=chngIP($_POST["password"]);
                echo $pswd;
            }
            if($boo)
            {
                chk_data($uid,$pswd);
            }

        }

        function chngIP($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;

        }//this rmoves trailing spaces and makes it an html element so you can't rip it off don't know why stripslashes but meh

        function chk_data($login, $pass){
            $eval = "SELECT /* columns which rep id and password*/ FROM /*table where it's saved*/ WHERE /* Col referring id*/ == '$login' "
            $eval_res= mysqli_query($conn, $eval);

            if (mysqli_num_rows($eval_res) > 0) {
                if(!($eval["#password column"] == $pass)){
                    $boo = false;
                    $pswderr = "Incorrect Password or Username";
                    $uiderr = "Please retype correct Information";

                }//wrong pass
                else
                {
                    login(); //this redirects to dash after login
                }
        }//if id does exist
        else {
                    $boo = false;
                    $pswderr = "Incorrect Password or Username";
                    $uiderr = "Please retype correct Information to Sign in";
        
        }
    }//chk_data ends here

       mysqli_close($conn);
        ?>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="Homepage.html" class="navbar-brand">Police Database</a>
            </div>

            <div>
                <ul class="nav navbar-nav">
                    <li><a href="Homepage.html">User Login</a></li>
                </ul>

                <ul class="nav navbar-nav">
                    <li class="active"><a href="CopLogin.html">Cop Login</a></li>
                </ul>

                <ul class="nav navbar-nav">
                    <li><a href="#">About</a></li>
                </ul>

                <ul class="nav navbar-nav">
                    <li><a href="#">Contact Us</a></li>
                </ul>

            </div>
        </div>
    </nav>

    <div class="col-xs-12" style="height:60px;"></div>

    <div class="userForm center-block">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <label for="uid">User ID</label>
            <input type="text" class="form-control" id="uid" placeholder="Enter User ID" name="uid">
            <span class="error">* <?php echo $uiderr; ?> </span>
            <br>
		    <label for="uid">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password">
            <span class="error">* <?php echo $pswderr;?></span>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>

</body>
</html>