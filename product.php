<?php include("Header.php"); ?>

        
<div id="main" align="center">            

    <h1>Select your Product</h1>
    <h2>Select options from the drop down menu</h2>

    <form name="formSubmit" action="product_searcher.php" method="post">
           
            <select name="category" class="gap">
                <?php 
                $sql = mysqli_query($con, "SELECT DISTINCT CATEGORY FROM car");
                echo '<option value="">--Type--</option>';
                while ($row = mysqli_fetch_array($sql)){
                echo '<option>'.$row['CATEGORY'].'</option>';
                }
                ?>
            </select>  

            <select name="price" class="gap">
                <?php 
                $sql = mysqli_query($con, "SELECT DISTINCT PRICE FROM car");
                echo '<option value="">--Seats--</option>';
                while ($row = mysqli_fetch_array($sql)){
                echo '<option>'.$row['PRICE'].'</option>';
                }
                ?>
            </select>  

            <select name="stock" class="gap">
                <?php 
                $sql = mysqli_query($con, "SELECT DISTINCT STOCK FROM car");
                echo '<option value="">--Rate--</option>';
                while ($row = mysqli_fetch_array($sql)){
                echo '<option>'.$row['STOCK'].'</option>';
                }
                ?>
            </select>  


        <p><input class="submitButton" type="submit" value="Find car">
    </form>
          
</div>
<?php include("Footer.php"); ?>