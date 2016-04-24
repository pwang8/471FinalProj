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

<div id="main" align="center">            

    <h1>Select your Product</h1>
    <h2>Select options from the drop down menu</h2>

    <form name="formSubmit" action="product_searcher.php" method="post">
           
            <select name="category" class="gap">
                <?php 
                $sql = mysqli_query($con, "SELECT DISTINCT category FROM product");
                echo '<option value="">--Type--</option>';
                while ($row = mysqli_fetch_array($sql)){
                echo '<option>'.$row['category'].'</option>';
                }
                ?>
            </select>  

            <select name="price" class="gap">
                <?php 
                $sql = mysqli_query($con, "SELECT DISTINCT price FROM product");
                echo '<option value="">--Price--</option>';
                while ($row = mysqli_fetch_array($sql)){
                echo '<option>'.$row['price'].'</option>';
                }
                ?>
            </select>  

            <select name="stock" class="gap">
                <?php 
                $sql = mysqli_query($con, "SELECT DISTINCT stock FROM product");
                echo '<option value="">--Stock--</option>';
                while ($row = mysqli_fetch_array($sql)){
                echo '<option>'.$row['stock'].'</option>';
                }
                ?>
            </select>  


        <p><input class="submitButton" type="submit" value="Find car">
    </form>
          
</div>

<div id="dispProdDiv" on>
        <?php
            $results = include("list_products.php");
            echo '<table>';
            echo '<th>Id</th><th>Image</th><th>Name</th><th>Stock</th><th>Price</th><th>Description</th><th>Category</th>';
            while($row = mysqli_fetch_row($results))
            {
                echo '<tr>';
                echo '<td>'.$row[0].'</td>';
                echo '<td>'.$row[1].'</td>';
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
</div>
<?php include("Footer.php"); ?>
