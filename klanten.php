<?php 

include "crudconfig.php";

$sql = "SELECT * FROM klanten";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

</head>

<body>
    <?php include 'navigatie.php'; ?>
    <div class="container">

        <h4>Klanten</h4>

<table class="table">

    <thead>
        <tr>
        <th>Naam</th>
        <th>Telefoon</th>
        <th>Email</th>
        <th><a href="createklant.php">+</th>
    </tr>
    </thead>

    <tbody> 

        <?php

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

        ?>

        <tr>
            <td><?php echo $row['Naam']; ?></td>
            <td><?php echo $row['Telefoon']; ?></td>
            <td><?php echo $row['Email']; ?></td>
            <td><a href="updateklant.php"> <img src="edit.png" width="20" height="20" /></a>
            <td><a href="deleteklant.php"> <img src="delete.png" width="20" height="20" /></a>
        </tr>                       

        <?php       }
            }
        ?>                

    </tbody>

</table>

    </div> 

</body>

</html>