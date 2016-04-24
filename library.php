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



















?>
