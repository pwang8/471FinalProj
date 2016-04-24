<?php
    include("./library.php");
    
	$method = $_GET["method"];
    if ($method == "addToCart")
        json_addToCart($_GET["productId"],$_GET["amount"],$_GET["sessionId"]);
    if ($method == "removeFromCart")
        json_removeFromCart($_GET["productId"], $_GET["sessionId"]);
    if ($method == "purchasePaypal")
        json_purchasePaypal($_GET["sessionId"], $_GET["user"], $_GET["pass"]);
    if ($method == "purchaseCredit")
        json_purchaseCredit($_GET["sessionId"], $_GET["cardNumber"],$_GET["lName"],$_GET["fName"],$_GET["expiryDate"],$_GET["cvc"]);
    if ($method == "fillCartDiv")
        json_fillCartDiv($_GET['sessionId']);
<<<<<<< HEAD
    if ($method == "getFilteredProducts")
        json_getFilteredProducts($_GET['selectedFilter']);
=======
    if($method == "getCustomer")
        json_getCustomer($_GET['sessionId']);
    if($method == "updateCustomer")
        json_updateCustomer($_GET['cID'], $_GET['f_name'], $_GET['l_name'], $_GET['address'], $_GET['phone_number'], $_GET['country'], $_GET['username'], $_GET['password'], $_GET['email']);
    
>>>>>>> origin/master
    //Functions ---------------------------------------------------------------------
    
    function json_addToCart($pId, $amount, $sessionId)
    {
        $valid = false;
        $message = "Something went wrong with the insertion process";
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
                if(!$valid)
                {
                    $message = "We couldn't add your paypal information.";
                }
                else
                {
                    $valid = buyCart($sessionId, $purchaseId);
                    $message = "Purchase successful";
                    if(!$valid)
                        $message = "Couldn't remove items from cart";
                }
            }
        }
        
		$output = array();
		$output["success"] = $valid;
		$output["message"] = $message;
		echo json_encode($output); //Prints your dictionary in JSON format
    }
    
    function json_purchaseCredit($sessionId, $cardNumber,$lName,$fName,$expiryDate,$Cvc)
    {
        $valid = false;
        $message = "default message";
        
        if(isset($cardNumber) && isset($lName) && isset($fName) && isset($expiryDate) && isset($Cvc))
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
                $purchaseId = getRecentPurchaseId();
                //Make a new instance of credit
                $valid = createCredit($purchaseId, $cardNumber, $lName, $fName, $expiryDate, $Cvc);
                if(!$valid)
                {
                    $message = "We couldn't add your credit information";
                }
                else
                {
                    $valid = buyCart($sessionId, $purchaseId);
                    $message = "Purchase successful";
                    if(!$valid)
                        $message = "Couldn't remove items from cart";
                }
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


    function json_fillCartDiv($cID){
        
        
        $output = array();
        $output["success"] = true;
		$output["message"] = "The data for the div is:";
        $output["data"]=cartInformation($cID);
		echo json_encode($output);
    }

<<<<<<< HEAD
    function json_getFilteredProducts($filter){
        
        
        $output = array();
        $output["success"] = true;
        $output["message"] = "The filtered Products are:";
        $output["data"] = filteredProducts($filter);
        echo json_encode($output);
    }
=======
    function json_getCustomer($cID)
    {
        $valid = false;
        $message = "Failed to retrieve customer.";
        $output = array();
        if(isset($cID))
        {
            $valid = true;
            $message = "Customer info populated";
            $output["data"] = getCustomer($cID);
        }
        else
        {
            $output["data"] = null;
        }
        $output["success"] = $valid;
        $output["message"] = $message;
        echo json_encode($output);
    }

    function json_updateCustomer($cID, $f_name, $l_name, $address, $phone_number, $country, $username, $password, $email)
    {
        $valid = false;
        $message = "Failed to update customer";
        $output = array();
        if(isset($cID) && isset($f_name) && isset($l_name) && isset($address) && isset($phone_number) && isset($country) && isset($username) && isset($password) && isset($email))
        {
            $valid = updateCustomer($cID, $f_name, $l_name, $address, $phone_number, $country, $username, $password, $email);
            $message = "Customer updated";
        }
        $output["success"] = $valid;
        $output["message"] = $message;
        echo json_encode($output);
    }

>>>>>>> origin/master











?>