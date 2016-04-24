<?php
    include("./library.php");
    
	$method = $_GET["method"];
    if ($method == "addToCart")
        json_addToCart($_GET["productId"],$_GET["amount"],$_GET["sessionId"]);
    if ($method == "removeFromCart")
        json_removeFromCart($_GET["productId"], $_GET["sessionId"]);
    if ($method == "purchasePaypal")
        json_purchasePaypal($_GET["sessionId"], $_GET["user"], $_GET["pass"]);
    //if ($method == "purchaseCredit")
    //    json_purchaseCredit($_GET["sessionId"]);
    
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

    function json_purchasePaypal($sessionId, $user, $pass)
    {
        $valid = false;
        $message = "default message";
        
        if(isset($sessionId) && isset($user) && isset($pass))
        {
            $totalCost = calculateTotalCost($sessionId);
            //Creates a general purchase on the database
            $valid = createPurchase($sessionId, $totalCost);
            if(!$valid)
            {
                $message = "Something went wrong with the purchase";
            }
            else
            {
                $message = "Purchase successful";
                $purchaseId = getRecentPurchaseId();
                //Make a new instance of paypal
                $valid = createPaypal($purchaseId, $user, $pass);
            }
        }
        
		$output = array();
		$output["success"] = $valid;
		$output["message"] = $message;
		echo json_encode($output); //Prints your dictionary in JSON format
    }

    //filler function
    function json_calculateTotalCost($sessionId)
    {
        return calculateTotalCost($sessionId);
    }


















?>