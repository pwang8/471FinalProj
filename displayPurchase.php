<?php include("Header.php");?>
<div id="dispPurcDiv" class="window">
        <?php
            $results = include("list_purchases.php");
            echo '<div><table border=1px align="center">';
            echo '<th>Id</th><th>Total</th><th>Date</th><th>CustomerID</th>';
            while($row = mysqli_fetch_row($results))
            {
                echo '<tr>';
                echo '<td>'.$row[0].'</td>';
                echo '<td>'.$row[1].'</td>';
                echo '<td>'.$row[2].'</td>';
                echo '<td>'.$row[3].'</td>';
                echo '</tr>';
            }
            echo '</table></div>';
        ?>
</div>
<?php include("Footer.php"); ?>