<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
include 'required.php';
if(isset($_POST['submit']))

{    

  // mysqli_REAL_ESCAPE is om SQL INJECTIONS TE ESCAPEN!
     $id = $_GET['id'];
     $host = mysqli_real_escape_string($conn, $_POST['host']);
     $ip = mysqli_real_escape_string($conn, $_POST['ip']);
     $gateway = mysqli_real_escape_string($conn, $_POST['gateway']);
     $netmask = mysqli_real_escape_string($conn, $_POST['netmask']);
     $dns = mysqli_real_escape_string($conn, $_POST['dns']);
     $netwerk = mysqli_real_escape_string($conn, $_POST['netwerk']);
     $sql = "UPDATE `pakket` SET `host` = '$host', `ip` = '$ip', `gateway` = '$gateway', `netmask` = '$netmask', `dns` = '$dns', `netwerk` = '$netwerk' WHERE `pakket`.`id` = $id;";
     
}
if ($conn->query($sql) === TRUE) {
    $home;
    exit;
} else {
  }
  ?>
</body>
</html>