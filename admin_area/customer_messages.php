<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'cmpe_final'); 
// define('DB_USERNAME', 'root');
// define('DB_PASSWORD', 'Password@123');
// define('DB_NAME', 'id19993608_cmpe_final'); 


$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($con == false) {
    dir('Error: Cannot connect');
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>E-Commerce Store</title>
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
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard / Customer messages
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
        <h1>Customer messages</h1>
    </div>
</div>

<br></br>
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Title</th>
                        <th scope="col">Message</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                $get_messages = "select * from customer_feedback";
                $run_messages = mysqli_query($con, $get_messages);
                while ($row = mysqli_fetch_array($run_messages)) {
                    $customer_name = $row['name'];
                    $customer_email = $row['email'];
                    $customer_title = $row['title'];
                    $customer_message = $row['message'];

                    echo "<tr>
                    <td>$customer_name</td>
                    <td>$customer_email</td>
                    <td>$customer_title</td>
                    <td>$customer_message</td>
                </tr>";
                }
                ?>
                </tbody>
            </table>

        </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>

</html>