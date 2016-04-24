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
</script>
<script>
function getFilteredProducts(cID)
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
                
            }
        }
    };
    //REQUEST TO WEBSERVICE
    xhttp.open("GET", Webservice_URL + "?method=fillCartDiv&sessionId="+cID, true);
    xhttp.send();
}
</script>
<script>
function fillProductDiv(responseData,sessionID){
    var html = "<table border =1px>";
    html+='<th>Id</th><th>Image</th><th>Name</th><th>Stock</th><th>Price</th><th>Description</th><th>Category</th><th>Qty</th><th>Add</th>';
    for(var i =0; responseData.length > i; i++){
            html+='<tr>';
            html+='<td>'+responseData[i][0]+'</td>';
            html+='<td><img src="'+responseData[i][1]+'"/></td>';
            html+='<td>'+responseData[i][2]+'</td>';
            html+='<td>'+responseData[i][3]+'</td>';
            html+='<td>'+responseData[i][4]+'</td>';
            html+='<td>'+responseData[i][5]+'</td>';
            html+='<td>'+responseData[i][6]+'</td>';
            html+='<td><input type="number" min="1" style="width:50" id="product'+$responseData[i][0]+'input"></td>';
            html+='<td><a href="javascript:addToCart('+$responseData[i][0]+','+sessionID+')">Add</a></td>';
            html+='</tr>';
    }
    html += "</table>";
    document.getElementById("dispProdBody").innerHTML = html;
}
</script>
<div id="prodMain" align="center">            

    <h1>Select your Product</h1>
    <h2>Select options from the drop down menu</h2>

    <form name="formSubmit">
           
            <select id="selector" name="filterer" class="gap">
                <option value="None">--Filters--</option>
                <option value="InStock">In Stock</option>
                <option value="$-$$">Price: $-$$</option>
                <option value="$$-$">Price: $$-$</option>
                <option value="Category">Category:A-Z</option>
                <option value="Name">Name:A-Z</option>
            </select>  


        <p><input class="submitButton" type="submit" value="orderProducts">
    </form>
          
    <div id="dispProdDiv">
        <?php 
                echo '<body id="dispProdBody" onload="getFilteredProducts('.$_SESSION['id'].')">';
            
                $results = include("list_products.php");
                echo '<table border=1px>';
                echo '<th>Id</th><th>Image</th><th>Name</th><th>Stock</th><th>Price</th><th>Description</th><th>Category</th><th>Qty</th><th>Add</th>';
                while($row = mysqli_fetch_row($results))
                {
                    echo '<tr>';
                    echo '<td>'.$row[0].'</td>';
                    echo '<td><img src="'.$row[1].'" alt="Image not found" style="max-width:250px;max-height:250px"/></td>';
                    echo '<td>'.$row[2].'</td>';
                    echo '<td>'.$row[3].'</td>';
                    echo '<td>'.$row[4].'</td>';
                    echo '<td>'.$row[5].'</td>';
                    echo '<td>'.$row[6].'</td>';
                    echo '<td><input type="number" min="1" style="width:50" id="product'.$row[0].'input"></td>';
                    echo '<td><a href="javascript:addToCart('.$row[0].','.$_SESSION['id'].')">Add</a></td>';
                    echo '</tr>';
                }
                echo '</table>';
            ?>
        </body>
    </div>
</div>

<?php include("Footer.php"); ?>
