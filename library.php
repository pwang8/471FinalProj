<?php
	$CONNECTION_HOST = "localhost";
	$CONNECTION_USER = "root";
	$CONNECTION_PASSWORD = "CPSC471!";
	$CONNECTION_DATABASE = "final_project";
    
	$link = mysqli_connect($CONNECTION_HOST, $CONNECTION_USER, $CONNECTION_PASSWORD, $CONNECTION_DATABASE);
	if (!$link)
	{
		echo mysqli_connect_error();
	}
    
    //Functions-------------------------------------
    
    //
	function addToCart($id, $pId, $amount)
	{
		global $link;
        $success = false;
		
		//Clean all the variables that you will use in creating your SQL statement to avoid "SQL Injection"
		$id = mysqli_real_escape_string($link, $id);
		$pId = mysqli_real_escape_string($link, $pId);
        $amount = mysqli_real_escape_string($link, $amount);
        
		//Create the SQL statement
		
        $stock = mysqli_query($link, "SELECT stock FROM product WHERE product_id ='".$pId."'");
        $stock = mysqli_fetch_row($stock)[0];
		if($stock==null)
        {
            $success = false;
        }
        else
        {
            if($stock >= $amount)
            {
                //Execute the SQL statement
                $SQL = "INSERT INTO `contains`(`customer_id`, `product_id`, `amount`) VALUES (".$id.",".$pId.",".$amount.")";
                if(mysqli_query($link, $SQL))
                {
                    $success = true;
                }
            }
        }
		return $success;
	}
    
    //
    function removeFromCart($id, $pId)
    {
		global $link;
        $success = false;
		
		//Clean all the variables that you will use in creating your SQL statement to avoid "SQL Injection"
		$id = mysqli_real_escape_string($link, $id);
		$pId = mysqli_real_escape_string($link, $pId);
        
        $SQL = "DELETE FROM `contains` WHERE `product_id` = ".$pId." AND `customer_id` = ".$id;
        
        $results = mysqli_query($link,$SQL);
        if($results)
        {
            $success = true;
        }
        return $success;
    }

    function createPurchase($customerId, $totalPaid)
    {
		global $link;
        $success = false;
        
		
		//Clean all the variables that you will use in creating your SQL statement to avoid "SQL Injection"
		$customerId = mysqli_real_escape_string($link, $customerId);
		$totalPaid = mysqli_real_escape_string($link, $totalPaid);
        
        $SQL = "INSERT INTO `purchase`(`purchase_id`, `customer_id`, `date`, `total_paid`) VALUES (null,".$customerId.",'',".$totalPaid.")";
        
        $results = mysqli_query($link,$SQL);
        if($results)
        {
            $success = true;
        }
        return $success;
    }

    function getRecentPurchaseId()
    {
        global $link;
        
        $purchaseId = mysqli_query($link, "SELECT MAX(purchase_id) FROM `purchase`");
        $purchaseId = mysqli_fetch_row($purchaseId)[0];
        return $purchaseId;
    }
    
    function createPaypal($purchaseId, $user, $pass)
    {
        $success = false;
        global $link;
        
        //clean variables
        $purchaseId = mysqli_real_escape_string($link, $purchaseId);
        $user = mysqli_real_escape_string($link, $user);
        $pass = mysqli_real_escape_string($link, $pass);
        
        $SQL = "INSERT INTO `paypal`(`purchase_id`, `paypal_username`, `paypal_password`) VALUES ('".$purchaseId."','".$user."','".$pass."')";
        $results = mysqli_query($link,$SQL);
        if($results)
        {
            $success = true;
        }
        
        return $success;
    }

    function createCredit($purchaseId, $cardNumber, $lName, $fName, $expiryDate, $Cvc)
    {
        $success = false;
        global $link;
        
        //clean variables
        $purchaseId = mysqli_real_escape_string($link, $purchaseId);
        $cardNumber = mysqli_real_escape_string($link, $cardNumber);
        $lName = mysqli_real_escape_string($link, $lName);
        $fName = mysqli_real_escape_string($link, $fName);
        $expiryDate = mysqli_real_escape_string($link, $expiryDate);
        $Cvc = mysqli_real_escape_string($link, $Cvc);
        
        $SQL = "INSERT INTO `credit`(`purchase_id`, `expiry_date`, `cvc`, `card_number`, `fname`, `lname`) VALUES (".$purchaseId.",'".$expiryDate."',".$Cvc.",".$cardNumber.",'".$fName."','".$lName."')";
        $results = mysqli_query($link,$SQL);
        if($results)
        {
            $success = true;
        }
        
        return $success;
    }
    
    function calculateTotalCost($sessionId)
    {
        global $link;
        //Clean
        $sessionId = mysqli_real_escape_string($link, $sessionId);
        
        $total = 'SELECT SUM(c.amount * p.price) AS total FROM contains AS c JOIN product p ON p.product_id = c.product_id WHERE c.customer_id ='.$sessionId;
        $total = mysqli_query($link,$total);
        return number_format(mysqli_fetch_array($total)[0],2);
    }

    //customerID as cID purchaseID as pID
    function buyCart($cID, $pID){
        
        global $link;
        $success = true;
        
        //Clean all the variables that you will use in creating your SQL statement to avoid "SQL Injection"
		$id = mysqli_real_escape_string($link, $cID);
		$pId = mysqli_real_escape_string($link, $pId);
        
        $findAllInCart = "SELECT * FROM contains WHERE customer_id =".$cID;
        $allInCart = mysqli_query($link, $findAllInCart);
        while($row = mysqli_fetch_row($allInCart))
        {
           if(removeFromCart($cID, $row[1])){
               $addToBought = "INSERT INTO `itemsbought` (`purchase_id`, `product_id`, `amount`) VALUES (".$pID.", ".$row[1].", ".$row[2].")";
               if(!mysqli_query($link, $addToBought)){
                    $success=false;
               }
               
               decrementStock($row[1], $row[2]);
               
           }
        }
        //echo 's'.$success;
        return $success;
    }
    
    function decrementStock($productId, $decrementValue)
    {
        global $link;
        $stock = mysqli_query($link, "SELECT `stock` FROM `product` WHERE product_id =".$productId);
        $stock = mysqli_fetch_row($stock);
        $stock[0] = $stock[0] - $decrementValue;
        $sql1= "UPDATE product SET `stock` = ".$stock[0]." WHERE product_id=".$productId;
        return mysqli_query($link, $sql1);    
    }
    
    function cartInformation($cID){
        global $link;
        $toReturn = array();
        
        //How many items in the users cart
        $itemCount = mysqli_query($link, "SELECT SUM(`amount`) FROM `contains` WHERE `customer_id` =".$cID);
        $toReturn[] = mysqli_fetch_array($itemCount)[0];
        
        $totalQuery ='SELECT SUM(c.amount * p.price) AS `total` FROM `contains` AS c JOIN `product` p ON p.product_id = c.product_id WHERE c.customer_id ='.$cID;
        $total = mysqli_query($link,$totalQuery);
        
        //Add the total to the array
        $toReturn[] = number_format(mysqli_fetch_array($total)[0],2);
        
        //Add every item of the cart/ the amount to the array
        $productTableSQL ="SELECT p.product_name, c.amount, p.product_id FROM contains AS c, product AS p WHERE c.customer_id = ".$cID." AND c.product_id = p.product_id";
        $inCart = mysqli_query($link, $productTableSQL);
        while($row = mysqli_fetch_array($inCart)){
            $itemInCart = array();
            $itemInCart[] = $row[0];
            $itemInCart[] = $row[1];
            $itemInCart[] = $row[2];
            $itemInCart[] = $cID;
            $toReturn[] = $itemInCart;
        }
        return $toReturn;
    }
    
    function filteredProducts($filter){
        global $link;
        $SQL = "";
        if($filter == "None")
            $SQL="SELECT * FROM product";
        elseif($filter=="InStock")
            $SQL="SELECT * FROM product WHERE stock>0";
        elseif($filter=="$-$$")
            $SQL="SELECT * FROM product ORDER BY price ";
        elseif($filter=="$$-$")
            $SQL="SELECT * FROM product ORDER BY price DESC";
        elseif($filter=="Category")
            $SQL="SELECT * FROM product ORDER BY category";
        elseif($filter=="Name")
            $SQL="SELECT * FROM product ORDER BY product_name";
        
        $filteredProd = mysqli_query($link, $SQL);
        $filteredProdArray = array();
        while($row = mysqli_fetch_array($filteredProd)){
            $productInfo = array();
            $productInfo[] = $row[0];
            $productInfo[] = $row[1];
            $productInfo[] = $row[2];
            $productInfo[] = $row[3];
            $productInfo[] = $row[4];
            $productInfo[] = $row[5];
            $productInfo[] = $row[6]; 
            $filteredProdArray[] = $productInfo;
        }
        return $filteredProdArray;
    }
    
    















?>
