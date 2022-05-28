<?php


use PHPUnit\Framework\TestCase;

class ProfileManagementTest extends TestCase
{
    public function testProfile()
    {
        if (isset($_REQUEST['Submit'])) {
            $username = $_SESSION['username'];
            $fname = $_REQUEST['fname'];
            $address1 = $_REQUEST['address1'];
            $address2 = $_REQUEST['address2'];
            $city = $_REQUEST['city'];
            $state = $_REQUEST['state'];
            $zipcode = $_REQUEST['zipcode'];

            $check_user = mysqli_query($con, "SELECT username FROM profiles where username = '$username' ");
            if (mysqli_num_rows($check_user) > 0) {
                $query = "UPDATE profiles SET
        fname = '$fname', address1 = '$address1', address2 = '$address2', city = '$city', state = '$state', zipcode = '$zipcode' 
        WHERE username = '$username'";

                $query_run = mysqli_query($con, $query);
                if ($query_run) {
                    $_SESSION['username'] = $username;
                    $_SESSION['state'] = $state;

                    echo ' <script type="text/javascript"> alert("Data Updated") </script> ';
                } else {
                    echo ' <script type="text/javascript"> alert("Data not Updated") </script> ';
                }

            } else {
                $query = "INSERT INTO `profiles` (username, fname, address1, address2, city, state, zipcode) 
        VALUES('$username', '$fname', '$address1', '$address2', '$city', '$state', '$zipcode')";

                $query_run = mysqli_query($con, $query);

                if ($query_run) {
                    $_SESSION['username'] = $username;
                    $_SESSION['state'] = $state;

                    echo ' <script type="text/javascript"> alert("Data Saved") </script> ';
                } else {
                    echo ' <script type="text/javascript"> alert("Data not Saved") </script> ';
                }
            }
        }

    }

}
