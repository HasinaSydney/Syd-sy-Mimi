<?php
include('../inc/function.php');

$deptName = $_GET['dept_name'] ?? '';
$employes = [];

if ($deptName) {
    $employes = getEmployes($deptName);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Employés du département</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        a {
            text-decoration: none;
            color: white;
        }
        a:hover {
            color: #66b3ff;
            text-decoration: underline;
        }
        h3 {
            text-align: center;
            margin-bottom: 30px;
            color: #0d6efd;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h3>Employés du département : <?= htmlspecialchars($deptName) ?></h3>

        <?php if (!empty($employes)): ?>
            <table class="table table-dark table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Sexe</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($employes as $emp): ?>
                        <tr>
                            <td>
                                <a href="fiche.php?emp_name=<?= urlencode($emp['last_name']) ?>">
                                    <?= htmlspecialchars($emp['last_name']) ?>
                                </a>
                            </td>
                            <td><?= htmlspecialchars($emp['first_name']) ?></td>
                            <td><?= htmlspecialchars($emp['gender']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-warning">Aucun employé trouvé pour ce département.</div>
        <?php endif; ?>
    </div>
</body>
</html>
