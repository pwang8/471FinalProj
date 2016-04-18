<?php include("Header.php");

if (isset($_SESSION['type'])){
    if ($_SESSION['type']=="g"){
        echo "<p style='color:white; padding:50px' align='center'> Log in error</p>";
    }
    else {
        echo '<center><form class="login" style="margin-top:50px"><p>You are now signed is as: <p>' . $_SESSION['name'] . '</p></p>
                <p><input type="button" onclick="location.href=\'http://localhost:8888/CarRental/index.php\';" value="Continue"/></p>
            </form></center>';
    }
}
function goHome(){
    header('Location: http://localhost:8888/CarRental/index.php');
}
include("Footer.php");?>



