<?php session_start();
if (!isset($_SESSION['type'])){
        $_SESSION['type'] = "g";
        //g=guest a=admin c=customer
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
        
        if ($_SESSION['type'] == 'C'){
            echo '<div align="right"><a onmouseover="this.innerHTML=\'View Profile\'" onmouseout="this.innerHTML=\''.$logtext.'\'" href="profile.php" class="loginButton">' . $logtext . '</a></div>';    //login button that changes to 'logout' when you hover over it (only when logged in)                  
        }
  
        elseif ($_SESSION['type'] == 'A'){
            echo '<div align="right"><a class=loginbutton style="margin-right:10px" href="adminOptions.php">Admin functions</a><a onmouseover="this.innerHTML=\'View Profile\'" onmouseout="this.innerHTML=\''.$logtext.'\'" href="profile.php" class="loginButton">' . $logtext . '</a></div>';    //login button that changes to 'logout' when you hover over it (only when logged in)                           
        }
        else {
            echo '<div align="right"><a href="login.php" class="loginButton">Log in</a></div>';
        }?>
        <div align="left"><a href="/471FinalProj/index.php"><img src="Shopping.jpg" height="90"></a></div>
    </p>
    <div align="center">
        <a href="product.php" class="titleButton">Products</a>
        <a href="cart.php" class="titleButton">Cart</a>
        <a href="aboutus.php" class="titleButton">AboutUs</a>

    </div>
    <body>
    <?php
    $con=mysqli_connect("localhost","root","CPSC471!","final_project");
        if (mysqli_connect_errno($con))
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
