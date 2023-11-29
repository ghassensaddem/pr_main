<?php
include '../controller/panierC.php';
include '../model/panier.php';

$error = "";
$panier = null;

// create an instance of the controller
$panierC = new panierC();

if (isset($_POST["nom"]) && isset($_POST["prix"]) && isset($_POST["prix_t"])) {
    if (!empty($_POST['nom']) && !empty($_POST["prix"]) && !empty($_POST["prix_t"])) {
        $panier = new panier(
            null,
            $_POST['nom'],
            $_POST['prix'],
            $_POST['prix_t']
        );

        $panierC->updatepanier($panier, $_POST['panier_id']);
        header('Location: listpanier.php');
        exit(); // Ajout de l'instruction exit() après la redirection pour éviter tout code exécution ultérieur
    } else {
        $error = "Missing information";
    }
}

// Si vous avez un panier_id valide, récupérez les informations du panier
if (isset($_POST['panier_id'])) {
    $panier = $panierC->showpanier($_POST['panier_id']);
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="listpanier.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if ($panier !== null) {
    ?>

        <form action="" method="POST">
            <table>
                <tr>
                    <td><label for="id">id :</label></td>
                    <td>
                        <input type="text" id="id" name="panier_id" value="<?php echo $panier['panier_id'] ?>" readonly />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="nom">Nom :</label></td>
                    <td>
                        <input type="text" id="nom" name="nom" value="<?php echo $panier['nom'] ?>" />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="prix">Prix :</label></td>
                    <td>
                        <input type="text" id="prix" name="prix" value="<?php echo $panier['prix'] ?>" />
                        <span id="erreurPrix" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="prix_t">Prix_t :</label></td>
                    <td>
                        <input type="text" id="prix_t" name="prix_t" value="<?php echo $panier['prix_t'] ?>" />
                        <span id="erreurPrix_t" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Save">
                        <input type="reset" value="Reset">
                    </td>
                </tr>
            </table>
        </form>

    <?php
    }
    ?>
</body>

</html>
