<?php
session_start();
include("includes/db.php");
include("functions/functions.php");

$product_id = $_REQUEST['product_id'];
$rating = $_REQUEST['star'];
$name = $_REQUEST['name'];
$emailId = $_REQUEST['emailId'];
$review = $_REQUEST['review'];

$query = "insert into reviews(product_id, rating, review, emailId, name) values('$product_id', '$rating', '$review', '$emailId','$name')";

if (mysqli_query($con, $query)) {
    echo "<script>window.open('details.php?pro_id=$product_id','_self')</script>";
} else {
    echo "Could not add review.";
}
?>
