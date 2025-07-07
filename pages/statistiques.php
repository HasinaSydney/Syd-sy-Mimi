<?php
include('../inc/function.php');
$titleStats = getTitleStats();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Statistiques par emploi</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .table-container {
            margin: 50px auto;
            width: 80%;
        }
        h1 {
            text-align: center;
            color: #0d6efd;
            margin-bottom: 40px;
        }
    </style>
</head>
<body>

<div class="table-container">
    <h1>Statistiques par Emploi</h1>
    <table class="table table-dark table-striped table-bordered">
        <thead>
            <tr>
                <th>Intitulé du poste</th>
                <th>Hommes</th>
                <th>Femmes</th>
                <th>Salaire moyen</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($titleStats as $stat): ?>
                <tr>
                    <td><?php echo $stat['title']?></td>
                    <td><?php echo $stat['hommes'] ?></td>
                    <td><?php echo $stat['femmes'] ?></td>
                    <td><?= number_format($stat['salaire_moyen'], 2, ',', ' ') ?> $</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>
