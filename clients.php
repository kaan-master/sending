<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script language="JavaScript" type="text/javascript" src="search.js"></script>
<link rel="stylesheet" href="stylesheet.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</body>

<?php
include 'navbar.php';

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'app.screenimpact_userdata';

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// retrieve data from the table
// $sql = "SELECT * FROM screens";
$sql = "SELECT * FROM screens
JOIN users ON screens.userId = users.id";
$result = $conn->query($sql);



// Print the data in a table
echo  "<input type='text' id='SearchInput' onkeyup='tableclients()'' placeholder='Search for hostname...' title='Type in a name'>";
echo '<table class="tableClients">';
echo '<tr>';
echo '<th>ID</th>';
echo '<th>Landscape</th>';
echo '<th>ip</th>';

echo '<th>Klant</th>';

echo '</tr>';

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $userid = $row["userId"];
        echo '<tr>';
        echo '<td>' . $row["id"] . '</td>';
        echo '<td>' . $row["isLandscape"] . '</td>';
        echo '<td>' . $row["ip"] . '</td>';
        echo '<td>' . $row["username"] . '</td>';
     
            
        // echo '<td>' .  $row["username"] . '</td>';

        echo '</tr>';
    }
} else {
    echo '<tr>';
    echo '<td colspan="4">No data found</td>';
    echo '</tr>';
}
echo '</table>';
echo '<p id="resultCount"></p>';
$conn->close();

?>

</body>
