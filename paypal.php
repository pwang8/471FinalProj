<?php include("Header.php");?>
<script>
function purchaseCart(sessionId)
{
    var Webservice_URL = "http://localhost/471FinalProj/webservice.php"; 
    var paypalUser = document.paypalForm.paypalEmail.value;
    var paypalPass = document.paypalForm.paypalPassword.value;
    
    //AJAX Request
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function()
    {
        //alert(xhttp.readyState+"<- rT, status ->"+xhttp.status);
        //REPLY FROM WEBSERVICE
        if (xhttp.readyState == 4 && xhttp.status == 200)
        {
            //Receive and decode the response to JSON object
            var response = JSON.parse(xhttp.responseText);
            //Check if the success returned was false
            if (!response.success)
            {
                alert(response.message); //Displays the error message returned from the server
            }
            else //If everything was okay
            {
                //Displays the message returned from the server
                alert(response.message);
                location.reload();
            }
        }
    };
    //REQUEST TO WEBSERVICE
    xhttp.open("GET", Webservice_URL + "?method=purchasePaypal&sessionId="+sessionId+"&user="+paypalUser+"&pass="+paypalPass, true);
    xhttp.send();
}
</script>
<?php
    echo "<h1>PayPal Purchase</h1>";
    echo '<form name="paypalForm" action="javascript:purchaseCart('.$_SESSION['id'].')">';
        echo 'Email: <input type="text" name="paypalEmail" required><br>';
        echo 'Password: <input type="password" name="paypalPassword" required><br>';
        echo '<input type="submit"/>';
    echo '</form>';
?>
</div>
<?php include("Footer.php"); ?>