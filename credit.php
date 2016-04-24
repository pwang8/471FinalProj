<?php include("Header.php");?>
<div>
    <h1>Credit Purchase</h1>
    <form action="" method="POST">
        Card Number: <input type="number" min="1000000000000000" max="999999999999999" name="creditCardNumber" required><br>
        First Name: <input type="text" name="creditFName" required><br>
        Last Name: <input type="text" name="creditLName" required><br>
        Expiry Date: <input type="text" name="creditExpiryDate" required><br>
        CVC: <input type="number" min="100" max = "999" name = "creditCVC" required><br>
        <input type="submit"/>
    </form>
</div>
<?php include("Footer.php"); ?>