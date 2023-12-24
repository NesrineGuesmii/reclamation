<?php

function est_connecter(): bool{

    if (session_status() === PHP_SESSION_NONE){
        session_start();
    }
    return !empty($_SESSION["connecter"]);

}
function force_user_est_connecter():void {
if(!est_connecter()){
    header("Location: ./login.php");
    exit();

}
     
}


function session_data() {
    include("bd.php");
    $id = $_SESSION['user_id'];
    $req = $mysqli->prepare("SELECT nom, prenom FROM utilisateurs WHERE id = ?");
    $req->bind_param("s", $id);
    $req->execute();
    $req->store_result();

    if ($req->num_rows > 0) {
        $req->bind_result($nom, $prenom);
        $req->fetch();

        return $nom . " " . $prenom;
    }
}

?>