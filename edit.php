<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    
    <title>Bewerk</title>
    <link rel="stylesheet" href="stylesheet.css">
    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- Bootstrap JavaScript -->
<script src="js/bootstrap.bundle.min.js"></script>

</head>
<body>

    <?php 
    include_once 'navbar.php';
    include 'app/database.php';
    echo "<div class='form-div'>";


    $id = $_GET['id'];
    $gethost = mysqli_query($conn, "SELECT host FROM pakket WHERE id= $id") ;


    $sql = "SELECT id,
                   host,
                   ether,
                   ip,
                   gateway,
                   netmask,
                   dns, 
                   netwerk,
                   date 
                   FROM pakket WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {


echo "<h5> Je kunt nu de gegevens van <U>" . $row["host"] ."</U> aanpassen. <BR>aangemaakt op: " . $row["date"]. "</h5>"; 
echo "<div class='form-group'> <form action='app/update.php?id=".$id."' method='post' class='form_1'>";
?>
        
        <input type="text" name="host" placeholder="host" class="form-control" value="<?php echo $row["host"]; ?>" required>
<input type="text" name="ether" placeholder="ether" class="form-control" value="<?php echo $row["ether"]; ?>">
<input type="text" name="ip" placeholder="ip" class="form-control" value="<?php echo $row["ip"]; ?>">
<input type="text" name="gateway" placeholder="gateway" class="form-control" value="<?php echo $row["gateway"]; ?>">
<input type="text" name="netmask" placeholder="netmask" class="form-control" value="<?php echo $row["netmask"]; ?>">
<input type="text" name="dns" placeholder="dns" class="form-control" value="<?php echo $row["dns"]; ?>">
<BR> <BR>
<?php
    echo "<p>selecteer een klant als dit een extra player is.</p>";
    $sqlUser = "SELECT id, username FROM users";
    $resultUser = mysqli_query($conn, $sqlUser);

    // Check if the query was successful
    if (mysqli_num_rows($resultUser) > 0) {
        // The query was successful, so create a dropdown menu
        echo "<select name='userId'>";
        while ($userRow = mysqli_fetch_assoc($resultUser)) {
            // Create an option element for each row
            if ($userRow["id"] == $row["userId"]) {
                echo "<option value='" . $userRow["id"] . "' selected>" . $userRow["username"] . "</option>";
            } else {
                echo "<option value='" . $userRow["id"] . "'>" . $userRow["username"] . "</option>";
            }
        }
        echo "</select>";
    } else {
        // The query was not successful, so display an error message
        echo "Error fetching data from the database.";
    }
?>
    
        <label></label  placeholder="DHCP OF STATIC">
        <select name="netwerk"> 
        <option type="text" name="netwerk" placeholder="Netwerktype" value="<?php echo $row["netwerk"];?>" >DHCP</option>
        <option type="text" name="netwerk" value="DHCP">DHCP</option>
        <option type="text" name="netwerk" value="Static">Static</option><a>     
            
        </a> <input type="submit" class="btn" name="submit" value="Submit"></form>
    </select>
    <BR>  <BR>

</div></div>
</th>
</form>

<?php }
} else {
    header('Location: index.php');
}
?>
</div>
</body>


</html>