<?php

require 'bd.php';
require './utils/crypt.php';


$query = "SELECT * FROM reclamation WHERE utilisateur_id = " . $_SESSION['user_id'];
$result = $mysqli->query($query);

$array = [];

var_dump($_SESSION);

foreach ($result as $value) {
    var_dump(bin2hex(pack('A*', $value['titre'])));
    
    #echo make_encryption('dec', $_SESSION['user_role'], pack('A*', $value['titre'])) . "dd";
    $value['titre'] = make_encryption("dec", $_SESSION["user_role"], $value['titre']);
    $value['description'] = make_encryption("dec", $_SESSION["user_role"], $value['description']);
    $value['date_creation'] = make_encryption("dec", $_SESSION["user_role"], $value['date_creation']);
}







