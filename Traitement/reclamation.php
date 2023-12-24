<?php
    
    require 'bd.php';
    require '../utils/crypt.php';

    session_start();


    if ($_POST) {
        var_dump($_POST);
        echo $_POST["titre"];

        $title = make_encryption("en", $_SESSION['user_role'], $_POST["titre"]);
        $description = make_encryption("en", $_SESSION['user_role'], $_POST["description"]);
        $date_creation = make_encryption("en", $_SESSION['user_role'], $_POST["date_creation"]);
        $id_user = $_SESSION["user_id"];

        
        if ($title != "" && $description != "") {
            $stmt = $mysqli->prepare("INSERT INTO reclamation (titre, description, date_creation, utilisateur_id) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $title, $description, $date_creation, $id_user);
            if ($stmt->execute()) {
                #echo "Inscription réussie.";
                header("Location: ../Employe.php?success=Reclamation inséré avec succès !");
            } else {
                header("Location: ../Employe.php?error=Une erreur est survenue. Réessayez plus tard !");
            }

            // Fermer la connexion
            $stmt->close();
            $mysqli->close();
        } else {
            header("Location: ../Employe.php?warning=Veuillez bien remplir le formulaire de création");
        }


    }

