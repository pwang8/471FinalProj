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


























?>
