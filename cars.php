<?php include("Header.php"); ?>

        
<div id="main" align="center">            

    <h1>Select your car</h1>
    <h2>Select options from the drop down menu</h2>

    <form name="formSubmit" action="car_searcher.php" method="post">
           
            <select name="type" class="gap">
                <?php 
                $sql = mysqli_query($con, "SELECT DISTINCT TYPE FROM car");
                echo '<option value="">--Type--</option>';
                while ($row = mysqli_fetch_array($sql)){
                echo '<option>'.$row['TYPE'].'</option>';
                }
                ?>
            </select>  

            <select name="seats" class="gap">
                <?php 
                $sql = mysqli_query($con, "SELECT DISTINCT SEATS FROM car");
                echo '<option value="">--Seats--</option>';
                while ($row = mysqli_fetch_array($sql)){
                echo '<option>'.$row['SEATS'].'</option>';
                }
                ?>
            </select>  

            <select name="rate" class="gap">
                <?php 
                $sql = mysqli_query($con, "SELECT DISTINCT RATE FROM car");
                echo '<option value="">--Rate--</option>';
                while ($row = mysqli_fetch_array($sql)){
                echo '<option>'.$row['RATE'].'</option>';
                }
                ?>
            </select>  

            <select name="color" class="gap">
                <?php 
                $sql = mysqli_query($con, "SELECT DISTINCT COLOR FROM car");
                echo '<option value="">--Color--</option>';
                while ($row = mysqli_fetch_array($sql)){
                echo '<option>'.$row['COLOR'].'</option>';
                }
                ?>
            </select>  

            <select name="model" class="gap">
                <?php 
                $sql = mysqli_query($con, "SELECT DISTINCT MODEL FROM car");
                echo '<option value="">--Model--</option>';
                while ($row = mysqli_fetch_array($sql)){
                echo '<option>'.$row['MODEL'].'</option>';
                }
                ?>
            </select>
        <p><input class="submitButton" type="submit" value="Find car">
    </form>
          
</div>
<?php include("Footer.php"); ?>