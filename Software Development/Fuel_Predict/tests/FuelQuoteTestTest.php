<?php


use PHPUnit\Framework\TestCase;

class FuelQuoteTestTest extends TestCase
{
    public function testFuelQuote()
    {
        $username = $_SESSION['username'];
        $query = "SELECT username, state, date, gallons, totalPrice  FROM fuel 
WHERE username = '$username'";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['state'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
                echo "<td>" . $row['gallons'] . "</td>";
                echo "<td>" . $row['totalPrice'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
    }

}
