<?php include("Header.php");?>
<script>
function addToCart(p_id, session_id)
{
    var Webservice_URL = "http://localhost/471FinalProj/webservice.php"; 
    var amount = document.getElementById("product"+p_id+"input").value;
    
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
                //Clears the textbox
                document.getElementById("product"+p_id+"input").value = "";
                
                //Displays the message returned from the server
                alert(response.message);
            }
        }
    };
    //REQUEST TO WEBSERVICE
    xhttp.open("GET", Webservice_URL + "?method=addToCart&productId="+p_id+"&amount="+amount+"&sessionId="+session_id, true);
    xhttp.send();
}

function getFilteredProducts(cID)
{
    
    var Webservice_URL = "http://localhost/471FinalProj/webservice.php"; 
    
    var selectorObj = document.getElementById("selector");
    var selectedValue= selectorObj.options[selectorObj.selectedIndex].value;
    
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
                fillProductDiv(response.data,cID);
            }
        }
    };
    //REQUEST TO WEBSERVICE
    xhttp.open("GET", Webservice_URL + "?method=getFilteredProducts&selectedFilter="+selectedValue, true);
    xhttp.send();
}

function fillProductDiv(responseData,sessionID)
{
    var html = "<table border =1px>";
    html+='<th>Id</th><th>Image</th><th>Name</th><th>Stock</th><th>Price</th><th>Description</th><th>Category</th><th>Qty</th><th>Add</th>';
    for(var i =0; responseData.length > i; i++)
    {
            html+='<tr>';
            html+='<td>'+responseData[i][0]+'</td>';
            html+='<td><img src="'+responseData[i][1]+'" style = "max-width:250px;max-height:250px"/></td>';
            html+='<td>'+responseData[i][2]+'</td>';
            html+='<td>'+responseData[i][3]+'</td>';
            html+='<td>'+responseData[i][4]+'</td>';
            html+='<td>'+responseData[i][5]+'</td>';
            html+='<td>'+responseData[i][6]+'</td>';
            html+='<td><input type="number" min="1" style="width:50" id="product'+responseData[i][0]+'input"></td>';
            html+='<td><a href="javascript:addToCart('+responseData[i][0]+','+sessionID+')">Add</a></td>';
            html+='</tr>';
    }
    html += "</table>";
    
    alert(document.getElementById("dispProdDiv"));
    document.getElementById("dispProdDiv").innerHTML = html;
    console.log(document.getElementById("dispProdDiv"));
    
    alert("Console reading time");
}
</script>
<div id="prodMain" class="window" align="center">            

    <h1>Select your Product</h1>
    <h2>Select options from the drop down menu</h2>
    <?php
        echo '<form name="formSubmit" onsubmit="getFilteredProducts('.$_SESSION['id'].')">';
               
        echo    '<select id="selector" class="gap">';
        echo       '<option value="None">--Filters--</option>';
        echo        '<option value="InStock">In Stock</option>';
        echo        '<option value="$-$$">Price: $-$$</option>';
        echo        '<option value="$$-$">Price: $$-$</option>';
        echo        '<option value="Category">Category:A-Z</option>';
        echo        '<option value="Name">Name:A-Z</option>';
        echo    '</select>';

        echo    '<p><input class="submitButton" type="submit" value="Filter Products"></p>';
        echo    '</form>';
        
        //echo '<body onload="getFilteredProducts('.$_SESSION['id'].')"/>';
       
        ?>
        <div id ="dispProdDiv">
        </div>  
       
</div>
<?php mysqli_close($con); ?>
</body>
</html>

