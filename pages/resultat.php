<?php
session_start();
if (isset($_SESSION['resultat'])) {
    $res = $_SESSION['resultat'];
} else {
    $res = [];
}
if (isset($_GET['offset'])) {
    $offset = (int) $_GET['offset'];
} else {
    $offset = 0;
}

$limit = 20;
$affichage = array_slice($res, 0, $limit);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <title>Résultats de la recherche</title>
</head>
<body>
<div class="container mt-5">
    <h1>Résultats de la recherche</h1>
    <table class="table table-danger">
        <thead>
            <tr>
                <th>Département</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Âge</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($affichage)){ ?>
<?php foreach($affichage as $resultat): ?>
                    <tr>
                        <td><?php echo $resultat['dept_name']; ?></td>
                        <td><?php echo $resultat['first_name'] ;?></td>
                        <td><?php echo $resultat['last_name'] ;?></td>
                        <td><?php echo $resultat['age'] ;?></td>
                    </tr>
                    <?php endforeach; ?>
                    <?php } else { ?>
                    <tr>
                        <td colspan="3">Aucun résultat trouvé.</td>
                    </tr>
                    <?php } ?>
        </tbody>
    </table>
<div class="d-flex justify-content-between mt-3">
    <div>
        <?php if ($offset > 0) { ?>
            <a href="traitement.php?offset=<?php echo $offset - $limit; ?>" class="btn btn-secondary">Précédent</a>
        <?php } ?>
    </div>
    <div>
        <?php if ($limit < count($res)) { ?>
            <a href="traitement.php?offset=<?php echo $offset + $limit; ?>" class="btn btn-primary">Suivant</a>
        <?php } ?>
    </div>
</div>
</div>
<a href="index.php" class ="btn btn-warning">Retour à la Liste</a>
<?php for($i = 0 ; $i <=(count($res)/20);$i++){ ?>
    <a href="#">page <?php echo $i ?></a>

    <?php } ?>
</body>
</html>