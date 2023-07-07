<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script language="JavaScript" type="text/javascript" src="script.js"></script>
</head>
<body>
  
</body>
</html>
<!DOCTYPE html>
<html lang="nl">
<meta charset="UTF-8">
<title>queue</title>
<head>
<link  rel="icon" type="image/x-icon"  href="images/logo.ico">
<?php 
// benodigde php scripten
include 'navbar.php';
include 'app/database.php';
?>
<body>
<div class="columns" style="display: flex; flex-direction: row;">


<?php

        
   $sql = "SELECT * FROM `pakket` WHERE `finished` = 0";
   $result = $conn->query($sql);
   
   if ($result->num_rows > 0) {
     // output data of each row

     
      echo "<div id='div1'> 
            <h1>Player vooraad</h1>
            <table class='data-table' id='queuetable'>
            <input type='text' id='SearchInput' onkeyup='searchtable()'' placeholder='Search for hostname...' title='Type in a name'>
            <tr>
            <th>id</th>
            <th>Selecteer</th>
            <th>Name</th>
            <th>Ether</th>
            <th>Ip</th>
            <th>Gateways</th>
            <th>Netmask</th>
            <th>Dns</th>
            <th>Type</th>

            <th>Send</th>
            <th>Edit</th>
            <th>Print</th>
            <th>Copy</th>
            <th></th>
            </tr>
            ";
            
            while($row = $result->fetch_assoc()) {

        echo  "<form action='printdata.php' method='post'>";?>
        <tr><td class="data"><?= $row['id'] ?></td>
        <?php
        echo  " <td><input type='checkbox' onclick='checknow()' name='id[]' value='". $row['id']."'></td>";
        echo  "<td class='data'>". $row["host"]    . "</td>";
            ?>
            <td class="data"><?= $row['ether'] ?></td>
            <td class="data"><?= $row['ip'] ?> </td>
            <td class="data"><?= $row['gateway'] ?></td>
            <td class="data"><?= $row['netmask'] ?></td>
            <td class="data"><?= $row['dns'] ?> </td>
            <td class="data"><?= $row['netwerk'] ?></td>
         
         <?php 




            echo "<td class='data'><a href=\"/sending/app/delete.php?id=".$row['id']."\"><i class='fa fa-fw fa-send'></i></a>
                  <td class='data'><a href=\"/sending/edit.php?id=".$row['id']."\"><i class='fa fa-fw fa-pencil'></i></a><BR></td>
                  <td class='data'><a href=\"/sending/print.php?print=".$row['id']."\"><i class='fa fa-fw fa-print'></i></a></td>
                  <td class='data'><a href=\"/sending/app/duplicate.php?id=".$row['id']."\"><i class='fa fa-fw fa-copy'></i></a></td>
                  </td>"; 

            }
            echo '<script>
            // get the total number of <tr> elements
            var totalRows = document.getElementsByTagName("tr").length;
            
            // display the total number of rows on the page
            document.write("Total Results: " + (totalRows - 1));
          </script>';
            echo  "</tr></table>";                
            echo  "<div id='hidebutton'>"; 
            echo  "<button type='submit' class='button' name='submit' value='print'><td class='data'><i class='fa fa-fw fa-copy'></i></a>print</button></td></form>";
            echo  "</div></div>";  

            
   }
  else {
     echo "<H3>De wachttrij is leeg</h3>";
  };

  $show_table_sql = "SHOW TABLE LIKE `pakket` FROM sending";

  $result2 = $conn->query($show_table_sql);
  if($result2 == FALSE) {
    echo "
<div id='div2'>
<div id='div3'>
<h1>Voeg player toe</h1>           
<form action='app/insert.php' method='post' class='form_1'>
<input type='text' name='host'     class='form-control'      placeholder='Hostname'>
<input type='text' name='ether'    class='form-control'      placeholder='Ether/Mac-adres' required>
<input type='text' name='ip'       class='form-control'      placeholder='Ip adres'       minlength='1'>
<input type='text' name='gateway'  class='form-control'      placeholder='Gateway'        minlength='1'> 
<input type='text' name='netmask'  class='form-control'      placeholder='Netmask'        minlength='1'> 
<input type='text' name='dns'      class='form-control'      placeholder='DNS Server'     minlength='1'>";

  // Connect to the database
  // Select all rows from the "users" table
  echo "<p>selecteer een klant als dit een extra player is.</p>";
  $sqlUser = "SELECT id, username FROM users";
    $resultUser = mysqli_query($conn, $sqlUser);

  // Check if the query was successful
  if (mysqli_num_rows($resultUser) > 0) {
    // The query was successful, so create a dropdown menu
    echo "<select name='userId'>";
    while ($row = mysqli_fetch_assoc($resultUser)) {
      // Create an option element for each row
      echo "<option value='".$row["id"]."'>" . $row["username"] . "</option>";
    }
    echo "</select>";
  } else {
    // The query was not successful, so display an error message
    echo "Error fetching data from the database.";
  }
  



echo "<BR><BR>
<label></label  placeholder='DHCP OF STATIC'>
<select name='netwerk'> 
<option type='text' name='netwerk' value='Static'>Static</option>
<option type='text' name='netwerk' value='DHCP'>DHCP</option><a>   
</a> <input type='submit' class='btn' name='submit' value='Submit'></form>
</select>
   <BR>  <BR>

</th>
</div></div>";
      }
  else {
    echo " Eerste keer op Sending?"; 
      ?>
      <form action="app/tablecreate.php">
       <input type="submit" value="Maak de database aan"/>
      </form>  
          <?php
          };



   $conn->close();
   
?>
</script>

</div>
</body>
</html>
