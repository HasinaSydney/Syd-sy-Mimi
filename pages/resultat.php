<?php
session_start();
$res = isset($_SESSION['resultat']) ? $_SESSION['resultat'] : [];
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

                    <tr>
                        <td><?php echo $res['dept_name']; ?></td>
                        <td><?php echo $res['first_name'] ;?></td>
                        <td><?php echo $res['age'] ;?></td>
                    </tr>

        </tbody>
    </table>
</div>
</body>
</html>