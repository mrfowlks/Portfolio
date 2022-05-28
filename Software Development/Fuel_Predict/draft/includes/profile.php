<?php  

namespace App;

class profile
{
    public $fullname;
    public $address;
    public $address2;
    public $city;
    public $state;
    public $zipcode;

    public function setFullName($ffullname)
    {
        $this -> fullname = $ffullname;
    }

    public function getFullName(){
        return 'Ben Lee';
    }
    
    public function setAddress($aadress)
    {
        $this -> address = $aadress;
    }

    public function getAddress(){
        return '123 abc st';
    }
    public function setAddress2($aadress2)
    {
        $this -> address2 = $aadress2;
    }

    public function getAddress2(){
        return '1233 abc st';
    }
    
    public function setCity($ccity)
    {
        $this -> city = $ccity;
    }

    public function getCity(){
        return 'Sugar Land';
    }
    
    public function setState($sstate)
    {
        $this -> state = $sstate;
    }

    public function getState(){
        return 'Texas';
    }

    public function setZipcode($zzipcode)
    {
        $this -> zipcode = $zzipcode;
    }

    public function getZipcode(){
        return '77479';
    }
}




/*session_start();
if(!isset($_SESSION['UserData']['Email'])){
header("location:/cosc4353/login.php");
exit;
}
*/

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
                    <label for="name">Full Name:</label>
                    <div class="row">
      <input type="text" id="name" name="name" required
       minlength="3" maxlength="50" size="10">
                  <div class="row">
                    <br>
                    <label for="name">Address 1:</label>
                    <div class="row">
      <input type="text" id="name" name="name" required
       minlength="3" maxlength="100" size="20">
                  <div class="row">
                    <br>
                    <label for="name">Address 2:</label>
                    <div class="row">
      <input type="text" id="name" name="name" optional
       minlength="3" maxlength="100" size="20">
                  <div class="row">
                    <br>
                    <label for="name">City:</label>
                    <div class="row">
      <input type="text" id="name" name="name" required
       minlength="3" maxlength="100" size="20">
                  <div class="row">
                    <br>
                    <label for="name">State:</label>
                    <div class="row">
                    <select>
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
                    <label for="name">Zipcode:</label>
                    <div class="row">
      <input type="text" id="name" name="name" required
       minlength="5" maxlength="9" size="10">
                  <div class="row">
                    <br>
                    <a href="/cosc4353/login.php">
                    <input type="submit" value="Submit">
                    </a>
                  <div class="row">
<form>
                  <a href="/cosc4353/logout.php">Log out</a>
</body>