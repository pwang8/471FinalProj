<?php include("Header.php");?>
<script>
function creditPurchaseCart(sessionId)
{
    var Webservice_URL = "http://localhost/471FinalProj/webservice.php"; 
    var cardNumber = document.creditForm.creditCardNumber.value;
    var cardFName = document.creditForm.creditFName.value;
    var cardLName = document.creditForm.creditLName.value;
    var expiryDate = document.creditForm.creditExpiryDate.value;
    var cvc = document.creditForm.creditCVC.value;
    
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
    xhttp.open("GET", Webservice_URL + "?method=purchaseCredit&sessionId="+sessionId+"&user="+paypalUser+"&pass="+paypalPass, true);
    xhttp.send();
}
</script>
<?php
    echo "<h1>Credit Purchase</h1>";
    echo "<form name='creditForm' action='creditPurchaseCart(".$_SESSION['id'].")'>";
        echo "Card Number: <input type='number' min='1000000000000000' max='999999999999999' name='creditCardNumber' required><br>";
        echo "First Name: <input type='text' name='creditFName' required><br>";
        echo "Last Name: <input type='text' name='creditLName' required><br>";
        echo "Expiry Date: <input type='text' name='creditExpiryDate' required><br>";
        echo "CVC: <input type='number' min='100' max = '999' name = 'creditCVC' required><br>";
        echo "<input type='submit'/>";
    echo "</form>";
?>
</div>
<?php include("Footer.php"); ?>