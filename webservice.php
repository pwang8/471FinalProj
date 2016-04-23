<?php
    include("./library.php");
    
	$method = $_GET["method"];
    if ($method == "addToCart")
        json_addToCart($_GET["productId"],$_GET["amount"],$_GET["sessionId"]);
    if ($method == "removeFromCart")
        json_removeFromCart($_GET["productId"], $_GET["sessionId"]);
    
    //Functions ---------------------------------------------------------------------
    
    function json_addToCart($pId, $amount, $sessionId)
    {
        $valid = false;
        $message = "default message";
		//Check if the name was inserted in the URL request (webservice.php?method=addUser&name=????)
		if (isset($amount)
            && $pId > 0
            && $amount > 0
            && $sessionId != null)
		{
            $valid = true;
            $message = "Item added to your cart";
		}
		
		//Adds the user using the library method
		if ($valid)
		{
			$valid = addToCart($sessionId, $pId, $amount);
			if (!$valid)
				$message = "Something went wrong with the insertion process";
		}
		
		$output = array();
		$output["success"] = $valid;
		$output["message"] = $message;
		echo json_encode($output); //Prints your dictionary in JSON format
    }
    
    function json_removeFromCart($pId, $sessionId)
    {
        $valid = false;
        $message = "default message";
        
        if(isset($pId) && isset($sessionId))
        {
            $valid = removeFromCart($sessionId, $pId);
            $message = "Product removed from cart.";
            if(!$valid)
            {
                $message = "Something went wrong with the removal process";
            }
        }
        
		$output = array();
		$output["success"] = $valid;
		$output["message"] = $message;
		echo json_encode($output); //Prints your dictionary in JSON format
    }






















?>