<?php
global $connection;
$connection = mysqli_connect('localhost', 'root', '', 'excellenttaste');

	if (!$connection) {
		die("Connection database failed");
	}

?>