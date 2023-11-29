<?php
include '../controller/panierC.php';

$eventC = new panierC();

if (isset($_GET["panier_id"])) {
    $eventC->deletepanier($_GET["panier_id"]);
}

header('Location: ../examples/dashboard.php');
?>
