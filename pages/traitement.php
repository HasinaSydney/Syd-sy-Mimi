<?php
session_start();
$age_min = $_GET['age_min'];
$departement = $_GET['recherche'];
$age_max = $_GET['age_max'];
require('../inc/function.php');
if (isset($_GET['recherche'], $_GET['age_min'] , $_GET['age_max'])) {
    $departement = $_GET['recherche'];
    $age_min = $_GET['age_min'];
    $age_max = $_GET['age_max'];
    
    $_SESSION['departement'] = $departement;
    $_SESSION['age_min'] = $age_min;
    $_SESSION['age_max'] = $age_max;
} else {
    // Utilise les valeurs de session si elles existent
    if(isset($_SESSION['departement'])){
     $departement = $_SESSION['departement'];
    }
    if(isset($_SESSION['age_min']) && isset($_SESSION['age_max'])){
        $age_min = $_SESSION['age_min'];
        $age_max = $_SESSION['age_max'];
    } else{
        $age_min = 0; // Valeur par défaut si non définie
        $age_max = 100; // Valeur par défaut si non définie
    }
}
$limit = 20;
if(isset($_GET['offset'])) {

    $offset = (int) $_GET['offset'];
} else {

    $offset = 0;
}



// Appel de la fonction avec offset et limit
$resultat = getDepartRecherche($departement, $age_min, $age_max, $offset, $limit+1);
$_SESSION['resultat'] = $resultat;

// Redirection vers resultat.php avec l'offset courant
header('Location: resultat.php?offset=' . $offset);
exit;
 


