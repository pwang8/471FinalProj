<?php include("Header.php"); ?>
<script>
function removeFromCart(p_id, session_id)
{
    
    var Webservice_URL = "http://localhost/471FinalProj/webservice.php"; 
    
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
    xhttp.open("GET", Webservice_URL + "?method=removeFromCart&productId="+p_id+"&sessionId="+session_id, true);
    xhttp.send();
}
</script>

<script>
function fillCartDiv(cID)
{
    var Webservice_URL = "http://localhost/471FinalProj/webservice.php"; 
    
    //AJAX Request
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function()
    {
        
        //REPLY FROM WEBSERVICE
        if (xhttp.readyState == 4 && xhttp.status == 200)
        {
            
            //Receive and decode the response to JSON object
            var response = JSON.parse(xhttp.responseText);
            //Check if the success returned was false\
            
            if (!response.success)
            {
                alert(response.message); //Displays the error message returned from the server
            }
            else //If everything was okay
            {
                //Displays the message returned from the server
                if(response.data[0]==null){
                    response.data[0] = 0;
                }
                var html =  "<div><h1> List of items </h1><p>You have: ";
                html += response.data[0]+" items in your cart</p>";
                html += "<p>For a total of: $"+response.data[1]+"</p>";
                html+='<div id="checkoutPanel"><button class="submitButton" onclick="window.location=\'paypal.php\'">PayPal</button>';
                    html+='<button class="submitButton" onclick="window.location=\'credit.php\'">Credit</button></div><br>';
                html += "<table border ='1'><tr><th>Product</th><th>Amount</th><th>Remove</th></tr>";
                
                    for (var i=2; i<response.data.length;i++) 	//response.data contains the array of user objects
                                                        //each userObject contain the id and name of a user
                    {
                        var userObject = response.data[i]; //Get the user at a specific index
                        html += "<tr>";
                            html += "<td>" + userObject[0] + "</td>";
                            html += "<td>" + userObject[1] + "</td>";
                            html += "<td><a href='javascript:removeFromCart(" + userObject[2] + ","+cID+")'>Remove</a></td>";
                        html += "</tr>";
                        
                    }
                    html+="</table></div>";
                    
                    document.getElementById("main").innerHTML = html;
            }
        }
    };
    //REQUEST TO WEBSERVICE
    xhttp.open("GET", Webservice_URL + "?method=fillCartDiv&sessionId="+cID, true);
    xhttp.send();
}
</script>
<div id="main" class="window" align="center" style="padding:50px">
    <?php 
        if($_SESSION['type']=="g"){
            echo '<div><p>You must sign in in order to view your cart!</p></div>';
        }
        else{
            echo '<script>fillCartDiv('.$_SESSION['id'].');</script>';
        }
    ?>
</div>
<?php include("Footer.php"); ?>