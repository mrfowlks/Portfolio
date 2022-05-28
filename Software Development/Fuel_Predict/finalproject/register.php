<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<style>
  form{
    align-items:center;
  }
  input{
    font-weight: normal;
    padding: 5px;
    margin-right: 5px;
    border-radius: 2px;
    width: 200px;
  }
  #dob{
    width: 200px;
  }
  #submit{
    width: 214px;
    font-size: large;
    background-color: blue;
    color: white;
    font-family: Verdana, Tahoma, sans-serif;


  }
  #submit:hover{

    background-color: white;
    color: black;
    cursor: pointer;
    border-color:black;
  }
  span{
    font-family: Verdana, Tahoma, sans-serif;
  }

  #color{
    width:25px;
    border-radius : 20px;
  }

  #colorsubmit{

    padding:2%;
    font-size:15px;
    background-color:transparent;
  }
  .center{
    margin-left:auto;
    margin-right:auto;
    align-items:center;
    justify-content:center;

  }
</style>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        
        $select = mysqli_query($con, "SELECT * FROM users WHERE username = '".$_POST['username']."'");
        if(mysqli_num_rows($select)) {
            echo "<div class='form'>
                <h3>Username already taken.</h3><br/>
                <p class='link'>Click here to <a href='register.php'>Register</a></p>
                </div>";

        }
        else {
            $query    = "INSERT into `users` (username, password)
                         VALUES ('$username',  '" . md5($password) . "')";
            $result   = mysqli_query($con, $query);
            if ($result) {
                echo "<div class='form'>
                      <h3>You are registered successfully.</h3><br/>
                      <p class='link'>Click here to <a href='index.php'>Login</a></p>
                      </div>";
            } else {
                echo "<div class='form'>
                      <h3>Required fields are missing.</h3><br/>
                      <p class='link'>Click here to <a href='register.php'>registration</a> again.</p>
                      </div>";
            }
        }    
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="password" class="login-input" name="password" placeholder="Password" >
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="index.php">Click to Login</a></p>
    </form>
<?php
    }
?>
</body>
</html>
