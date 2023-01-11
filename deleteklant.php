<?php 

include "crudconfig.php"; 

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $sql = "DELETE FROM `klanten` WHERE `id`='$id'";

     $result = $conn->query($sql);

     if ($result == TRUE) {
        echo "Klant succesvol verwijderd.";
    }else{
        echo "Error:" . $sql . "<br>" . $conn->error;
    }

} 

?>