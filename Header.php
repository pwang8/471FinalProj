<?php session_start();
if (!isset($_SESSION['type'])){
        $_SESSION['type'] = "g";
        //g=guest a=admin c=customer e=employee
    }
    //setcookie(name, value, expire, path, domain);
    //setcookie("user", "Jake", time()+3600);
?>

<html>
    <meta charset="UTF-8"> 
    <head>
        <link href="coolstyle.css" type="text/css" rel="stylesheet">
    </head>
    <p>
        <?php        
        $logtext = $_SESSION['type'] . ': ' . $_SESSION['name'];
        if ($_SERVER['REQUEST_URI'] == "/CarRental/profile.php"){
            if ($_SESSION['type'] == 'E'){
                echo '<div align="right"><a class=loginbutton style="margin-right:10px" href="employeeOptions.php">Employee functions</a><a onmouseover="this.innerHTML=\'Log out\'" onmouseout="this.innerHTML=\''.$logtext.'\'" href="logout.php" class="loginButton">' . $logtext . '</a></div>';    //login button that changes to 'logout' when you hover over it (only when logged in)                           
            }
            elseif ($_SESSION['type'] == 'A'){
                echo '<div align="right"><a class=loginbutton style="margin-right:10px" href="adminOptions.php">Admin functions</a><a onmouseover="this.innerHTML=\'Log out\'" onmouseout="this.innerHTML=\''.$logtext.'\'" href="logout.php" class="loginButton">' . $logtext . '</a></div>';    //login button that changes to 'logout' when you hover over it (only when logged in)                           
            }
            else {
                echo '<div align="right"><a onmouseover="this.innerHTML=\'Log out\'" onmouseout="this.innerHTML=\''.$logtext.'\'" href="logout.php" class="loginButton">' . $logtext . '</a></div>';

            }
        }
        elseif ($_SESSION['type'] == 'C'){
            echo '<div align="right"><a onmouseover="this.innerHTML=\'View Profile\'" onmouseout="this.innerHTML=\''.$logtext.'\'" href="profile.php" class="loginButton">' . $logtext . '</a></div>';    //login button that changes to 'logout' when you hover over it (only when logged in)                  
        }
        elseif ($_SESSION['type'] == 'E'){
            echo '<div align="right"><a class=loginbutton style="margin-right:10px" href="employeeOptions.php">Employee functions</a><a onmouseover="this.innerHTML=\'View Profile\'" onmouseout="this.innerHTML=\''.$logtext.'\'" href="profile.php" class="loginButton">' . $logtext . '</a></div>';    //login button that changes to 'logout' when you hover over it (only when logged in)                           
        }
        elseif ($_SESSION['type'] == 'A'){
            echo '<div align="right"><a class=loginbutton style="margin-right:10px" href="adminOptions.php">Admin functions</a><a onmouseover="this.innerHTML=\'View Profile\'" onmouseout="this.innerHTML=\''.$logtext.'\'" href="profile.php" class="loginButton">' . $logtext . '</a></div>';    //login button that changes to 'logout' when you hover over it (only when logged in)                           
        }
        else {
            echo '<div align="right"><a href="login.php" class="loginButton">Log in</a></div>';
        }?>
        <div align="left"><a href="/CarRental/index.php"><img src="logo.png" height="90"></a></div>
    </p>
    <div align="center">
        <a href="cars.php" class="titleButton">Rent</a>
        <a href="rates.php" class="titleButton">Rates</a>
        <a href="location.php" class="titleButton">Locations</a>
        <a href="AboutUs.php" class="titleButton">About Us</a>
    </div>
    <body>
    <?php
    $con=mysqli_connect("localhost","root","root","rent_a_car");
        if (mysqli_connect_errno($con))
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    

