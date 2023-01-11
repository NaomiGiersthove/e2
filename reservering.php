<?php

include "db.php";

if (isset($_POST['submit'])) {
	
$date =	$_POST['date'];
$time =	$_POST['time'];
$allergien =	$_POST['allergien'];
$telefoon =	$_POST['phone'];
$comment =	$_POST['comment'];
$aantal =	$_POST['aantal'];
$email =    $_POST['email'];
$naam =	$_POST['name'];

$connection = mysqli_connect('localhost', 'root', '', 'excellenttaste');

	if (!$connection) {
		
		echo "Connection database failed";
	}

	$query = "INSERT INTO reservering(date, time, allergien, comment, aantal) VALUES ('$date', '$time', '$allergien', '$comment', '$aantal')";
    $query = "INSERT INTO klanten(email, telefoon, naam) VALUES ('$email', '$telefoon', '$naam')";

	$result = mysqli_query($connection, $query);

		if (!$result) {
			die('Query failed' . mysqli_error());
		}

/*	if ($username && $password) {
		echo $username;
		echo $password;
	} else {
		echo "Type your username and password";
	}

echo $username;
echo $password;

*/}




?>




<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'navigatie.php'; ?>
	<meta charset="UTF-8">

	<title>Reserveren</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<h2>Reserveren</h2>
</head>
<body>
	<div class="container">

		<div class="col-xs-6"> 
			<form action="reserve.php" method="post">
				<div class="form-group">
				<label for="name">Voor- en achternaam</label>
				<input type="text" name="name" class="form-control">
				</div>

				<div class="form-group">
				<label for="date">Datum</label>
				<input type="date" name="date" class="form-control">
				</div>

                <div class="form-group">
				<label for="time">Tijdstip</label>
				<input type="time" name="time" class="form-control">
				</div>

                <div class="form-group">
				<label for="email">Emailadres</label>
				<input type="email" name="email" class="form-control">
				</div>

                <div class="form-group">
				<label for="aantal">Aantal personen</label>
				<input type="int" name="aantal" class="form-control">
				</div>

                <div class="form-group">
				<label for="allergien">Allergien</label>
				<input type="text" name="allergien" class="form-control">
				</div>

                <div class="form-group">
				<label for="phone">Telefoonnummer</label>
				<input type="varchar" name="phone" class="form-control">
				</div>

                <div class="form-group">
				<label for="comment">Opmerkingen</label>
				<input type="text" name="comment" class="form-control">
				</div>

				<input class="btn btn-primary" type="submit" name="submit" value="Send">

			</form>
		</div>
	
</body>
</html>