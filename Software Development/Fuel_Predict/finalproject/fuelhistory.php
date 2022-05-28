<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
ob_start();
require('db.php');
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
 <div class="row">
   <div class="col-sm-8">
    <?php echo $deleteMsg??''; ?>
    <div class="table-responsive">
      <table class="table table-bordered">
       <thead></th>
         <th>Username</th>
         <th>State</th>
         <th>Date</th>
         <th>Gallons</th>
         <th>Total Price</th>
    </thead>
    <tbody>
    <a href="profile.php">Return to Profile</a>
<?php
$username = $_SESSION['username'];
$query = "SELECT username, state, date, gallons, totalPrice  FROM fuel 
WHERE username = '$username'";
$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
    echo "<td>" . $row['username'] . "</td>";
    echo "<td>" . $row['state'] . "</td>";   
    echo "<td>" . $row['date'] . "</td>";   
    echo "<td>" . $row['gallons'] . "</td>";   
    echo "<td>" . $row['totalPrice'] . "</td>";
     echo "</tr>";
    }
    echo "</table>";
} 
else{
    echo "0 results";
}


?>
