<?php include("Header.php");?>
<div id="dispPurcDiv" on>
        <?php
            $results = include("list_customers.php");
            echo '<table border ="1">';
            echo '<th>CustomerID</th><th>firstname</th><th>lastname</th><th>address</th><th>phone#</th><th>country</th><th>username</th><th>password</th><th>email</th>';
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
                echo '<td>'.$row[7].'</td>';
                echo '<td>'.$row[8].'</td>';

                echo '</tr>';
            }
            echo '</table>';
        ?>
</div>
<?php include("Footer.php"); ?>