<?php
include("Header.php");
$category = $_POST["category"];
$price = $_POST["price"];
$stock = $_POST["stock"];
$name = $_POST["name"];
$description = $_POST["desc"];
$image = $_POST["imageUrl"];
if($category == "New Category")
{
    $newCategory = $_POST["newCategory"];
    $category = $newCategory;
}
$sql= "INSERT INTO product(product_id, product_image, product_name, stock, price, description, category)
        VALUES ('NULL', '".$image."', '".$name."', '".$stock."', '".$price."', '".$description."', '".$category."')";
if (!mysqli_query($con,$sql))
{
die('Error: ' . mysqli_error($con));
}
else
echo "1 record added";
include("Footer.php");