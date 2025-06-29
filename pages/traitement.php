<?php
session_start();
if(isset($_GET['departement']) && isset($_GET['nom']) && isset($_GET['age_min']) && isset($_GET['age_max'])) {
    require('../inc/function.php');
    $departement = $_GET['departement'];
    $nom = $_GET['nom'];
    $age_min = $_GET['age_min'];
    $age_max = $_GET['age_max'];

    $resultat = getDepartRecherche($departement, $nom, $age_min, $age_max);
$_SESSION['resultat'] = $resultat;

    header('Location: resultat.php');
    exit;
} 
