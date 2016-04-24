<?php include("Header.php");?>
<script>
function updateCustomer()
{
    var Webservice_URL = "http://localhost/471FinalProj/webservice.php";
    var cID = document.getElementById("profileCustomerId").value;
    var f_name = document.getElementById("profileFName").value;
    var l_name = document.getElementById("profileLName").value;
    var address = document.getElementById("profileAddress").value;
    var phone_number = document.getElementById("profilePhone").value;
    var country = document.getElementById("profileCountry").value;
    var username = document.getElementById("profileUser").value;
    var password = document.getElementById("profilePass").value;
    var email = document.getElementById("profileEmail").value;
    
    //AJAX Request
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function()
    {
        //alert(xhttp.readyState+"-"+xhttp.status);
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
                if(response.data[0]==null){
                    response.data[0] = 0;
                }
                else
                {
                    alert(response.message);
                    populateCustomerInfo(cID);
                }
            }
        }
    };
    //REQUEST TO WEBSERVICE
    xhttp.open("GET", Webservice_URL + "?method=updateCustomer&cID="+cID+"&f_name="+f_name+"&l_name="+l_name+"&address="+address+"&phone_number="+phone_number+"&country="+country+"&username="+username+"&password="+password+"&email="+email, true);
    xhttp.send();
}
function populateCustomerInfo(cId)
{
    var Webservice_URL = "http://localhost/471FinalProj/webservice.php";
    //AJAX Request
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function()
    {
        //alert(xhttp.readyState+"-"+xhttp.status);
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
                if(response.data[0]==null){
                    response.data[0] = 0;
                }
                else
                {
                    var html = '<form onsubmit="updateCustomer()">'
                    html+='Your ID:<br><input type="text" id="profileCustomerId" readonly value="'+response.data[0]+'"><br>';
                    html+='Username:<br><input type="text" id="profileUser" readonly value="'+response.data[6]+'"><br>';
                    html+='Password:<br><input type="text" id="profilePass" value="'+response.data[7]+'"><br>';
                    html+='First Name: <br><input type="text" id="profileFName" value="'+response.data[1]+'"><br>';
                    html+='Last Name:<br> <input type="text" id="profileLName" value="'+response.data[2]+'"><br>';
                    html+='Address:<br> <input type="text" id="profileAddress" value="'+response.data[3]+'"><br>';
                    html+='Phone:<br> <input type="text" id="profilePhone"value="'+response.data[4]+'"><br>';
                    html+='Country:<br> <input type="text" id="profileCountry"value="'+response.data[5]+'"><br>';
                    html+='Email: <br><input type="text" id="profileEmail" value="'+response.data[8]+'"><br>';
                    html+='<input type="submit" class="submitButton" value="Update"/>';
                    html+='</form>';
                    
                    document.getElementById("customerFields").innerHTML = html;
                }
            }
        }
    };
    //REQUEST TO WEBSERVICE
    xhttp.open("GET", Webservice_URL + "?method=getCustomer&sessionId="+cId, true);
    xhttp.send();
}
</script>

<div align="center" class="window">
    <h1>Profile details</h1>
    <h2>View and change profile information here</h2>
    <div id="customerFields">
    <?php
        echo '<body onload="populateCustomerInfo('.$_SESSION["id"].')"/>';
    ?>
    </div>
    <center>   
    <form align='center' style="margin-top: 50px" action="logout.php">
        <input type="submit" class="submitButton" value="Log out">
    </form>
    </center>
</div>
<?php include("Footer.php");?>

