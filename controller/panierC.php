<?php

require '../config.php';

class panierC
{

    public function listpanier()
    {
        $sql = "SELECT * FROM panier"; // Correction du nom de la table
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deletepanier($panier_id)
    {
        $sql = "DELETE FROM panier WHERE panier_id = :panier_id";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);
            $req->bindValue(':panier_id', $panier_id, PDO::PARAM_INT); // Utilisez PDO::PARAM_INT pour vous assurer que c'est un entier
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addpanier($panier)
    {
        $sql = "INSERT INTO panier (nom,prix,prix_t)  
                VALUES (:nom, :prix, :prix_t)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $panier->getnom(),
                'prix' => $panier->getprix(),
                'prix_t' => $panier->getprix_t(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function showpanier($panier_id)
    {
        $sql = "SELECT * FROM panier WHERE panier_id = :panier_id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':panier_id', $panier_id, PDO::PARAM_INT);
            $query->execute();
            $panier = $query->fetch();
            return $panier;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updatepanier($panier, $panier_id) // Correction du nom de la fonction
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE panier SET 
                nom = :nom, 
                prix = :prix, 
                prix_t = :prix_t
                WHERE panier_id= :panier_id'
            );

            $query->execute([
                'panier_id' => $panier_id,
                'nom' => $panier->getnom(),
                'prix' => $panier->getprix(),
                'prix_t' => $panier->getprix_t(),
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
?>
