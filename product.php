<?php include("Header.php"); ?>

<div id="main" align="center">            

    <h1>Select your Product</h1>
    <h2>Select options from the drop down menu</h2>

    <form name="formSubmit" action="product_searcher.php" method="post">
           
            <select name="category" class="gap">
                <?php 
                $sql = mysqli_query($con, "SELECT DISTINCT CATEGORY FROM product");
                echo '<option value="">--Type--</option>';
                while ($row = mysqli_fetch_array($sql)){
                echo '<option>'.$row['CATEGORY'].'</option>';
                }
                ?>
            </select>  

            <select name="price" class="gap">
                <?php 
                $sql = mysqli_query($con, "SELECT DISTINCT PRICE FROM product");
                echo '<option value="">--Seats--</option>';
                while ($row = mysqli_fetch_array($sql)){
                echo '<option>'.$row['PRICE'].'</option>';
                }
                ?>
            </select>  

            <select name="stock" class="gap">
                <?php 
                $sql = mysqli_query($con, "SELECT *  FROM product WHERE stock >0");
                echo '<option value="">--Stock--</option>';
                while ($row = mysqli_fetch_array($sql)){
                echo '<option>'.$row['STOCK'].'</option>';
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
            echo '<th>Id</th><th>Image</th><th>Name</th><th>Stock</th><th>Price</th><th>Description</th>';
            while($row = mysqli_fetch_row($results))
            {
                echo '<tr>';
                echo '<td>'.$row[0].'</td>';
                echo '<td>'.$row[1].'</td>';
                echo '<td>'.$row[2].'</td>';
                echo '<td>'.$row[3].'</td>';
                echo '<td>'.$row[4].'</td>';
                echo '<td>'.$row[5].'</td>';
                echo '</tr>';
            }
            echo '</table>';
        ?>
</div>
<?php include("Footer.php"); ?>
