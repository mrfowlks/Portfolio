<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
ob_start();
?>

 

<html lang="en">
<head>
  <title>Client Profile Management</title>
</head>

<body>
<form action="" method="post" name="Info_Form">
      <font size="+3">Profile Management</font>
                  <div class="row">
                    <br>
                    <label>Full Name:</label>
                    <div class="row">
      <input type="text" name="fname" required
       minlength="3" maxlength="50" size="10">
                  <div class="row">
                    <br>
                    <label>Address 1:</label>
                    <div class="row">
      <input type="text" name="address1" required
       minlength="3" maxlength="100" size="20">
                  <div class="row">
                    <br>
                    <label>Address 2:</label>
                    <div class="row">
      <input type="text" name="address2" optional
       minlength="3" maxlength="100" size="20">
                  <div class="row">
                    <br>
                    <label>City:</label>
                    <div class="row">
      <input type="text" name="city" required
       minlength="3" maxlength="100" size="20">
                  <div class="row">
                    <br>
                    <label>State:</label>
                    <div class="row">
                    <select name = "state">
                          <option value="AL">Alabama</option>
                          <option value="AK">Alaska</option>
                          <option value="AZ">Arizona</option>
                          <option value="AR">Arkansas</option>
                          <option value="CA">California</option>
                          <option value="CO">Colorado</option>
                          <option value="CT">Connecticut</option>
                          <option value="DE">Delaware</option>
                          <option value="DC">District Of Columbia</option>
                          <option value="FL">Florida</option>
                          <option value="GA">Georgia</option>
                          <option value="HI">Hawaii</option>
                          <option value="ID">Idaho</option>
                          <option value="IL">Illinois</option>
                          <option value="IN">Indiana</option>
                          <option value="IA">Iowa</option>
                          <option value="KS">Kansas</option>
                          <option value="KY">Kentucky</option>
                          <option value="LA">Louisiana</option>
                          <option value="ME">Maine</option>
                          <option value="MD">Maryland</option>
                          <option value="MA">Massachusetts</option>
                          <option value="MI">Michigan</option>
                          <option value="MN">Minnesota</option>
                          <option value="MS">Mississippi</option>
                          <option value="MO">Missouri</option>
                          <option value="MT">Montana</option>
                          <option value="NE">Nebraska</option>
                          <option value="NV">Nevada</option>
                          <option value="NH">New Hampshire</option>
                          <option value="NJ">New Jersey</option>
                          <option value="NM">New Mexico</option>
                          <option value="NY">New York</option>
                          <option value="NC">North Carolina</option>
                          <option value="ND">North Dakota</option>
                          <option value="OH">Ohio</option>
                          <option value="OK">Oklahoma</option>
                          <option value="OR">Oregon</option>
                          <option value="PA">Pennsylvania</option>
                          <option value="RI">Rhode Island</option>
                          <option value="SC">South Carolina</option>
                          <option value="SD">South Dakota</option>
                          <option value="TN">Tennessee</option>
                          <option value="TX">Texas</option>
                          <option value="UT">Utah</option>
                          <option value="VT">Vermont</option>
                          <option value="VA">Virginia</option>
                          <option value="WA">Washington</option>
                          <option value="WV">West Virginia</option>
                          <option value="WI">Wisconsin</option>
                          <option value="WY">Wyoming</option>
                        </select>				
                  <div class="row">
                    <br>
                    <label>Zipcode:</label>
                    <div class="row">
      <input type="number" name="zipcode" required
       oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
        type = "number" maxlength = "5" >
                  <div class="row">
                    <br>
                    <a href="login.php">
                    <input type="submit" value="Submit" name="Submit">
                    </a>
                  <div class="row">
<form>
                <a href="fuelquote.php">Fuel Quote</a>
                <br><br>
                <a href="fuelhistory.php">Fuel History</a>
                <br><br>
                  <a href="logout.php">Log out</a>
</body>
</html>

<?php
    require('db.php');
    
if(isset($_REQUEST['Submit']))
{
    $username = $_SESSION['username'];
    $fname = $_REQUEST['fname'];
    $address1 = $_REQUEST['address1'];
    $address2 = $_REQUEST['address2'];
    $city = $_REQUEST['city'];
    $state = $_REQUEST['state'];
    $zipcode = $_REQUEST['zipcode'];

    $check_user = mysqli_query($con, "SELECT username FROM profiles where username = '$username' ");
    if(mysqli_num_rows($check_user) > 0){
        $query = "UPDATE profiles SET
        fname = '$fname', address1 = '$address1', address2 = '$address2', city = '$city', state = '$state', zipcode = '$zipcode' 
        WHERE username = '$username'";
        
        $query_run = mysqli_query($con,$query);
        if($query_run)
        {
            $_SESSION['username'] = $username;
            $_SESSION['state'] = $state;
            
            echo  ' <script type="text/javascript"> alert("Data Updated") </script> ';
        }
        else
        {
            echo  ' <script type="text/javascript"> alert("Data not Updated") </script> ';
        }
    
    } else {
        $query = "INSERT INTO `profiles` (username, fname, address1, address2, city, state, zipcode) 
        VALUES('$username', '$fname', '$address1', '$address2', '$city', '$state', '$zipcode')";
    
        $query_run = mysqli_query($con,$query);
        
        if($query_run)
        {
            $_SESSION['username'] = $username;
            $_SESSION['state'] = $state;
            
            echo  ' <script type="text/javascript"> alert("Data Saved") </script> ';
        }
        else
        {
            echo  ' <script type="text/javascript"> alert("Data not Saved") </script> ';
        }
    }
}
?>
