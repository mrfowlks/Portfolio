<?php 

namespace App;

class login
{
    public $email;
    public $password;

    public function setEmail($eemail)
    {
        $this -> email = $eemail;
    }

    public function getEmail(){
        return 'Ben@gmail.com';
    }
    
    public function setPassword($ppassword)
    {
        $this -> password = $ppassword;
    }

    public function getPassword(){
        return '123abc';
    }
}

/*session_start(); 
    if(isset($_POST['Submit'])){
        $logins = array('Ben@gmail.com' => '123456','username1' => 'password1','username2' => 'password2');
        $Email = isset($_POST['Email']) ? $_POST['Email'] : '';
        $Password = isset($_POST['Password']) ? $_POST['Password'] : '';
        if (isset($logins[$Email]) && $logins[$Email] == $Password){
        $_SESSION['UserData']['Email']=$logins[$Email];
        header("Location:/cosc4353/profile.php");
        exit;
    } else {
        $msg="<span style='color:red'>Invalid Login Details</span>";
    }
    }*/
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">
    <link rel="stylesheet" href="css/styles.css?v=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<style>
    h1{
        text-align: center;
    }
    form{
        padding-left: 42%;
        padding-top: 1%;}
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
    #login_details{
        text-align: center;

        font-family: Verdana, Tahoma, sans-serif;
        font-weight: bold
    }
    span{
        font-family: Verdana, Tahoma, sans-serif;

    }
</style>
<body>
<img src=
             "https://drawinghowtos.com/wp-content/uploads/2021/07/gas-pump-colored.jpg"
     width="100" height="75"
     alt="Fuel Calculations Logo">

<h1>Log In</h1>
<hr size="3">

<form action="" method="POST">
<?php if(isset($msg)){?>
    <tr>
      <td colspan="2" align="center" valign="top"><?php echo $msg;?></td>
    </tr>
    <?php } ?>

    <input type="email" name="Email"  placeholder="Email Address" required></input><br><br>
    <input type="password" name="Password" placeholder="Enter Password" required minlength="3" maxlength="50"></input><br><br>

    <input type="submit" name="Submit"  value="LOGIN"></input><br><br>
    <span>Don't have an account?<br>Register <a href="/cosc4353/register.php">Here</a></span>

</form><br><br>



</body>
</html>