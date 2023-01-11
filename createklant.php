<?php 

include "crudconfig.php";

  if (isset($_POST['submit'])) {

    $naam = $_POST['naam'];
    $telefoon = $_POST['telefoon'];
    $email = $_POST['email'];

    $sql = "INSERT INTO `klanten`(`naam`, `telefoon`, `email`) VALUES ('$naam','$telefoon','$email')";

    $result = $conn->query($sql);

    if ($result == TRUE) {

      echo "Nieuwe klant toegevoegd";

    }else{

      echo "Error:". $sql . "<br>". $conn->error;

    } 

    $conn->close(); 

  }

?>

<!DOCTYPE html>

<html>

<body>

<h2>Voeg klant toe</h2>

<form action="" method="POST">

  <fieldset>

    <legend>Klanten</legend>

    Naam:<br>
    <input type="text" name="naam">
    <br>

    Telefoon:<br>
    <input type="int" name="telefoon">
    <br>

    Email:<br>
    <input type="email" name="email">

    <br><br>

    <input type="submit" name="submit" value="submit">

  </fieldset>

</form>

</body>

</html>