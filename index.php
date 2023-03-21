<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
include('./php/track_page_visits.php');
store_visited_pages("Index");
?>
<?php
$reviews = mysqli_query($con, "SELECT *, AVG(rating) as avg_rating FROM `reviews` GROUP BY product_id ORDER BY AVG(rating) DESC LIMIT 4;");
?>


<!DOCTYPE html>
<html>

<head>
	<title>MarketPlace</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="styles/style.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
		integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

<body>
	<!--Tracking Popup-->
	<div class="modal fade" id="trackingModal" role="dialog" style="z-index:10000;">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header" style="display: unset;text-align: center;">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Tracking System</h4>
				</div>
				<div class="modal-body" style="overflow:none;">
					<iframe src="tracking.php" style="width: 470px;height: 470px;"></iframe>
				</div>
			</div>

		</div>
	</div>

	<div id="top">
		<!--Top Bar Start -->
		<div class="container">
			<!--container Start -->
			<div class="col-md-6 offer">
				<!--col-md-6 offer Start -->
				<a href="#" class="btn btn-success btn-sm">
					<?php
                    if (!isset($_SESSION['customer_email'])) {
	                    echo "Welcome Guest";
                    } else {
	                    echo "Welcome: " . $_SESSION['customer_email'] . "";
                    }
                    ?>
				</a>

				<a href="#">Shopping Cart Total Price: $
					<?php totalPrice(); ?> , Total Items
					<?php item(); ?>
				</a>

			</div>
			<!--col-md-6 offer Start -->

			<div class="col-md-6">
				<ul class="menu">
					<li>
						<a href="#" data-toggle="modal" data-target="#trackingModal">Page Tracking</a>
					</li>

					<li>
						<a href="customer_registration.php"> Register</a>
					</li>

					<li>
						<?php
                        if (!isset($_SESSION['customer_email'])) {
	                        echo "<a href='checkout.php'>My Account</a>";
                        } else {
	                        echo "<a href='customer/my_account.php?my_order'>My Account</a>";
                        }
                        ?>
					</li>

					<li>
						<a href="cart.php"> Go to Cart</a>
					</li>

					<li>
						<?php
                        if (!isset($_SESSION['customer_email'])) {
	                        echo "<a href='checkout.php'>Login</a>";
	                        echo "  ";
	                        echo "<li><a href='google.php'>Login with Google</a></li>";

                        } else {
	                        echo "<a href='logout.php'>Logout</a>";
                        }
                        ?>
					</li>
				</ul>

			</div>


		</div>
		<!--container End -->


	</div>
	<!--Top Bar End -->

	<div class="navbar navbar-default" id="navbar">
		<!--navbar navbar-default start -->
		<div class="container">
			<div class="navbar-header">
				<!--navbar-header start -->
				<!-- <a class="navbar-brand home" href="index.php">
					<img src="images/logo.jpg" alt="Shopping" class="hidden-xs">
					<img src="images/logo.jpg" alt="Shopping" class="visible-xs">
				</a> -->

				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
					<span class="sr-only"> Toggle Navigation</span>
					<i class="fa fa-align-justify"> </i>
				</button>

				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
					<span class="sr-only"></span>
					<i class="fa fa-search"></i>
				</button>
			</div>
			<!--navbar-header start -->

			<div class="navbar-collapse collapse" id="navigation">
				<!--navbar-collapse collapse start -->
				<div class="padding-nav">
					<!--padding-nav start -->
					<ul class="nav navbar-nav navbar-left">
						<li class="active">
							<a href="index.php">Home</a>
						</li>
						<li>
							<a href="shop.php"> Shop</a>
						</li>
						<li>
							<a href="contactus.php"> Contact Us</a>
						</li>

					</ul>
				</div>
				<!--padding-nav start -->
				<a href="cart.php" class="btn btn-primary navbar-btn right">
					<i class="fa fa-shopping-cart"></i>
					<span>
						<?php item(); ?> items In Cart
					</span>
				</a>


				<div class="navbar-collapse collapse right">
					<!--navbar-collapse collapse-right start -->
					<button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse"
						data-target="#search">
						<span class="sr-only"> Toggle Search</span>
						<i class="fa fa-search"></i>
					</button>
				</div>
				<!--navbar-collapse collapse-right End -->

				<div class="collapse clearfix" id="search">

					<form class="navbar-form" method="get" action="search.php">
						<div class="input-group">
							<input type="text" name="user_query" placeholder="Search" class="form-control" required="">
							<span class="input-group-btn">
								<button type="submit" value="Search" name="search" class="btn btn-primary">
									<i class="fa fa-search"></i>
								</button>
							</span>
						</div>

					</form>
				</div>

			</div>
			<!--navbar-collapse collapse End -->

		</div>


	</div>
	<!--navbar navbar-default End -->



	<div class="container" id="slider">
		<!--Conatiner Start-->
		<div class="col-md-12">
			<!--col-md-12 Start-->
			<div class="carousel slide" id="myCarousel" data-ride="carousel">
				<!--carousel slide Start-->
				<ol class="carousel-indicators">
					<li data-target="myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="myCarousel" data-slide-to="1"></li>
					<li data-target="myCarousel" data-slide-to="2"></li>
					<li data-target="myCarousel" data-slide-to="3"></li>
				</ol>

				<div class="carousel-inner">
					<div class="item active">
						<img src="admin_area/slider_images/9.jpg">
					</div>
					<div class="item ">
						<img src="admin_area/slider_images/8.jpg">
					</div>
					<div class="item ">
						<img src="admin_area/slider_images/6.jpg">
					</div>
					<div class="item ">
						<img src="admin_area/slider_images/7.jpg">
					</div>



				</div>
				<!--carousel-inner End-->


				<a href="#myCarousel" class="left carousel-control" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
					<span class="sr-only">Previous</span>

				</a>

				<a href="#myCarousel" class="right carousel-control" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
					<span class="sr-only">Next</span>

				</a>
			</div>
			<!--carousel slide End-->
		</div>
		<!--col-md-12 End-->

	</div>
	<!--Conatiner End-->

	<!--advantage End-->




	<div id="hot">
		<!--hot Start-->
		<div class="box">
			<div class="container">
				<div class="col-md-12">
					<h2>Most Visited Produts</h2>
				</div>
			</div>
		</div>
	</div>

	<div id="content" class="container">
		<div class="row">
			<?php
            if (isset($_COOKIE['most_visited'])) {
	            $previously_visited_cookie = $_COOKIE['most_visited'];

	            $previously_visited = unserialize($previously_visited_cookie);
	            arsort($previously_visited);
	            //print_r($previously_visited);
            	//print_r(arsort($previously_visited));
            	//$mvp5 = array_slice($previously_visited, 0, 3);
            	//print_r($mvp5);
            	$i = 0;
	            foreach ($previously_visited as $element => $value) {

		            if ($i < 5) {
			            $i++;
			            $pro_id = $element;
			            $get_product = "select * from products where product_id='$pro_id' ";
			            $run_product = mysqli_query($con, $get_product);
			            while ($row = mysqli_fetch_array($run_product)) {

				            $pro_id = $row['product_id'];
				            $product_title = $row['product_title'];
				            $product_price = $row['product_price'];
				            $product_img1 = $row['product_img1'];
				            echo "
				<div class='col-sm-4 col-sm-6 single'>
				<div class='product same-height'>
				<a href='details.php?pro_id=$pro_id'>
				<img src='$product_img1' class='img-responsive'>
				</a>
				<div class='text'>
				<h3><a href='details.php?pro_id=$pro_id'>$product_title</a></h3>
				<p class='price'>$ $product_price</p>
				<p class='button'>
					<a href = 'details.php?pro_id=$pro_id' class ='btn btn-default'>View Details</a>
					<a href = '#' class ='btn btn-primary'><i class='fa fa-shopping-cart'></i> Add to Cart</a>
				</p>
				</div>
				</div>
				</div>			";

			            }
		            }


	            }
	            echo "</table>";
	            echo "</div>";
	            echo "<br>";
            }

            ?>
		</div>
	</div>
	<!-- most visited product in each category -->

	<?php
if (isset($_COOKIE['most_visited'])) {
	$previously_visited_cookie = $_COOKIE['most_visited'];

	$previously_visited = unserialize($previously_visited_cookie);
	arsort($previously_visited);
	$category = mysqli_query($con, "SELECT * from product_category ");
	while ($db_category = mysqli_fetch_array($category)) {
		$cat = $db_category['p_cat_id'];
		$cat_title = $db_category['p_cat_title'];
		echo "<div id='hot'>
			<!--hot Start-->
			<div class='box'>
				<div class='container'>
					<div class='col-md-12'>
						<h2>Most Visited $cat_title</h2>
					</div>
				</div>
			</div>
		</div>
		<div id='content' class='container'>
		<div class='row'>";
		//print_r($previously_visited);
		//print_r(arsort($previously_visited));
		//$mvp5 = array_slice($previously_visited, 0, 3);
		//print_r($mvp5);
		$i = 0;
		foreach ($previously_visited as $element => $value) {
			$pro_id = $element;
			$get_product = "select * from products where product_id='$pro_id' and p_cat_id='$cat'";
			$run_product = mysqli_query($con, $get_product);
			while ($row = mysqli_fetch_array($run_product)) {
				if ($i < 5) {
					$i++;
					$pro_id = $row['product_id'];
					$product_title = $row['product_title'];
					$product_price = $row['product_price'];
					$product_img1 = $row['product_img1'];
					echo "
				<div class='col-sm-4 col-sm-6 single'>
				<div class='product same-height'>
				<a href='details.php?pro_id=$pro_id'>
				<img src='$product_img1' class='img-responsive'>
				</a>
				<div class='text'>
				<h3><a href='details.php?pro_id=$pro_id'>$product_title</a></h3>
				<p class='price'>$ $product_price</p>
				<p class='button'>
					<a href = 'details.php?pro_id=$pro_id' class ='btn btn-default'>View Details</a>
					<a href = '#' class ='btn btn-primary'><i class='fa fa-shopping-cart'></i> Add to Cart</a>
				</p>
				</div>
				</div>
				</div>			";

				}
			}

			echo "</div>
			</div>";
		}
	}
	echo "</table>";
	echo "</div>";
	echo "<br>";
}

?>

	<!-- Top 5 products based on ratings-->
	<div id="hot">
		<!--hot Start-->
		<div class="box">
			<div class="container">
				<div class="col-md-12">
					<h2>Top Rated Products</h2>
				</div>
			</div>
		</div>
	</div>

	<div id="content" class="container">
		<div class="row">

			<?php
            while ($db_review = mysqli_fetch_array($reviews)) {
	            $pro_id = $db_review['product_id'];
	            $get_product = "select * from products where product_id='$pro_id' ";
	            $run_product = mysqli_query($con, $get_product);
	            while ($row = mysqli_fetch_array($run_product)) {

		            $pro_id = $row['product_id'];
		            $product_title = $row['product_title'];
		            $product_price = $row['product_price'];
		            $product_img1 = $row['product_img1'];
		            echo "
						<div class='col-sm-4 col-sm-6 single'>
						<div class='product same-height'>
						<a href='details.php?pro_id=$pro_id'>
						<img src='$product_img1' class='img-responsive'>
						</a>
						<div class='text'>
						<h3><a href='details.php?pro_id=$pro_id'>$product_title</a></h3>
						<p class='price'>$ $product_price</p>
						<p class='button'>
							<a href = 'details.php?pro_id=$pro_id' class ='btn btn-default'>View Details</a>
							<a href = '#' class ='btn btn-primary'><i class='fa fa-shopping-cart'></i> Add to Cart</a>
						</p>
						</div>
						</div>
						</div>
					";
	            }
            }
            ?>
		</div>
	</div>
	<!-- Top 5 products based on ratings in each category-->
	<?php
$category = mysqli_query($con, "SELECT * from product_category ");
while ($db_category = mysqli_fetch_array($category)) {
	$cat = $db_category['p_cat_id'];
	$cat_title = $db_category['p_cat_title'];
	echo "<div id='hot'>
				<!--hot Start-->
				<div class='box'>
					<div class='container'>
						<div class='col-md-12'>
							<h2>Top Rated Products in $cat_title</h2>
						</div>
					</div>
				</div>
			</div>
			<div id='content' class='container'>
			<div class='row'>";
	$reviews = mysqli_query($con, "SELECT *, AVG(reviews.rating) as avg_rating FROM `reviews` JOIN `products` on reviews.product_id = products.product_id  WHERE products.p_cat_id ='$cat' GROUP BY reviews.product_id ORDER BY AVG(reviews.rating) DESC LIMIT 4;");
	while ($db_review = mysqli_fetch_array($reviews)) {
		$pro_id = $db_review['product_id'];
		$get_product = "select * from products where product_id='$pro_id' ";
		$run_product = mysqli_query($con, $get_product);
		while ($row = mysqli_fetch_array($run_product)) {

			$pro_id = $row['product_id'];
			$product_title = $row['product_title'];
			$product_price = $row['product_price'];
			$product_img1 = $row['product_img1'];
			echo "
						<div class='col-sm-4 col-sm-6 single'>
						<div class='product same-height'>
						
						<div class='text'>
						<h3><a href='details.php?pro_id=$pro_id'>$product_title</a></h3>
						<p class='price'>$ $product_price</p>
						<p class='button'>
							<a href = 'details.php?pro_id=$pro_id' class ='btn btn-default'>View Details</a>
							<a href = '#' class ='btn btn-primary'><i class='fa fa-shopping-cart'></i> Add to Cart</a>
						</p>
						</div>
						</div>
						</div>
						
					";
		}
	}
	echo "</div>
			</div>";
}
?>

	<!--Footer Start-->
	<?php
    include("includes/footer.php");
    ?>

	<!--Footer End-->

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>

</html>