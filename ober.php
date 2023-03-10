<?php 

	// Database connectie en functies
    include 'database.php';

	// Database connectie om data op te halen uit de database
    $db = new database();

	// Select statement om data te verzamelen uit de database
    $overzicht_ober = $db->select("SELECT bestellingen.ID AS bestelid, reserveringen.Tafel, bestellingen.Aantal, menuitems.Naam, bestellingen.Gereserveerd, bestellingen.Klaar FROM `bestellingen` INNER JOIN reserveringen ON bestellingen.Reservering_ID = reserveringen.ID INNER JOIN menuitems ON bestellingen.Menuitem_ID = menuitems.ID INNER JOIN gerechtsoorten ON menuitems.Gerechtsoort_ID = gerechtsoorten.ID INNER JOIN gerechtcategorien ON gerechtsoorten.Gerechtcategorie_ID = gerechtcategorien.ID WHERE bestellingen.Klaar = 1 AND bestellingen.Gereserveerd = 0",[]);

    if (!empty($overzicht_ober)) {
        $columns = array_keys($overzicht_ober[0]);
        $row_data = array_values($overzicht_ober);
    }

    // Als de ober op de button klikt, dan betekent het dat het product aan de klant gegeven wordt
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['gereed'])) {

        $bestelid = htmlspecialchars(trim($_POST['bestelid']));
        $db->select("UPDATE `bestellingen` SET `Gereserveerd` = '1' WHERE ID = :bestelid",[':bestelid' => $bestelid]);

        header("refresh:1;");
        echo '<script>alert("Product is onderweg naar de klant!")</script>';
    }
?>

<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Ober</title>
</head>
<body>

	<?php include 'navigatie.php'; ?>

	<h1>Overzicht voor de Ober</h1>

	<?php if (!empty($overzicht_ober)) { ?>
		<table>
			<thead>
				<tr>
					<th>Tafel</th>
					<th>Aantal</th>
					<th>Gerecht</th>
					<th>Ready</th>
				</tr>
			</thead>
			<tbody>

				<?php foreach ($row_data AS $data) { ?>
					<tr>
						<td><?php echo $data["Tafel"]?></td>
						<td><?php echo $data["Aantal"]?></td>
						<td><?php echo $data["Naam"]?></td>
						<?php if ($data["Gereserveerd"] == 0) { ?>
							<form method="post">
								<input type="hidden" name="bestelid" value="<?php echo $data['bestelid'] ?>">
								<td><button type="sumbit" name="gereed">Ja</button><td>
							</form>
						<?php }?>
					</tr>
				<?php } ?>		
			</tbody>
		</table>
	<?php }else{
		echo "<h3>Producten zijn nog niet klaar</h3>";
	} ?>
</body>
</html>