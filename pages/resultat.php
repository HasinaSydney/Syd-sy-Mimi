<?php
session_start();
if (isset($_SESSION['resultat'])) {
    $res = $_SESSION['resultat'];
} else {
    $res = null;
}
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
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Département</th>
                <th>Nom</th>
                <th>Âge</th>
            </tr>
        </thead>
        <tbody>
<?php foreach($res as $resultat): ?>
                    <tr>
                        <td><?php echo $resultat['dept_name']; ?></td>
                        <td><?php echo $resultat['first_name'] ;?></td>
                        <td><?php echo $resultat['age'] ;?></td>
                    </tr>
<?php if(empty($res)): ?>
                    <tr>
                        <td colspan="3">Aucun résultat trouvé.</td>
                    </tr>
                      <?php endif; ?>
<?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>