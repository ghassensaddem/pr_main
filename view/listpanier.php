<?php
include "../controller/panierC.php";

$c = new panierC();
$tab = $c->listpanier();
?>

<center>
    <h1>List of paniers</h1>
    <h2>
        <a href="addpanier.php">Add panier</a>
    </h2>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>id</th>
        <th>nom</th>
        <th>prix</th>
        <th>prix_t</th>
    </tr>

    <?php
    foreach ($tab as $panier) {
    ?>

        <tr>
            <td><?= $panier['panier_id']; ?></td>
            <td><?= $panier['nom']; ?></td>
            <td><?= $panier['prix']; ?></td>
            <td><?= $panier['prix_t']; ?></td>
           
            <td align="center">
                <form method="POST" action="updatepanier.php">
                    <input type="submit" name="updatepanier" value="Update">
                    <input type="hidden" value="<?= $panier['panier_id']; ?>" name="panier_id">
                </form>
            </td>
            <td>
                <a href="deletepanier.php?id_panier=<?php echo $panier['panier_id']; ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
