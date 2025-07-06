<?php
include('../inc/function.php');
$currentManager = getCurrentMan();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste départements</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="index.css">
    <style>
        .tableau {
            margin: 0 auto;
            border-collapse: collapse;
            width: 80%;
            background-color: #212529;
            color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .tableau thead th {
            font-weight: bold;
            background-color: #343a40;
            padding: 12px 16px;
        }

        .tableau tbody td {
            border-bottom: 1px solid #444;
            padding: 10px 16px;
        }

        .tableau tbody tr:hover {
            background-color: #495057;
        }

        a {
            color: #dab7b0;
            text-decoration: none;
        }

        a:hover {
            color: #66b3ff;
            text-decoration: underline;
        }

        header.d-flex {
            align-items: center;
            color: #fff;
            padding: 24px 40px 18px 40px;
            border-radius: 10px;
            margin-bottom: 32px;
            box-shadow: 0 4px 16px rgba(13, 110, 253, 0.08);
        }

        header.d-flex h1 {
            font-size: 2.2rem;
            font-weight: 700;
            color: #29c1e7;
        }

        header.d-flex a.btn:hover {
            background: #fff;
            color: #0d6efd;
        }
    </style>
</head>

<body>
    <header class="d-flex justify-content-between mt-3">
        <h1>Liste départements</h1>
        <div class="container ml-5">
            <a class="btn btn-primary" href="recherche.php">Recherche</a>
            <a class="btn btn-primary" href="statistiques.php">Statistiques</a>
        </div>

    </header>

    <div class="container mt-5">
        <table class="tableau">
            <thead>
                <tr>
                    <th>Nom département</th>
                    <th>Manager</th>
                    <th>Nombre d'employés</th>
                </tr>
            </thead>
            <tbody>
            <tbody>
                <?php foreach ($currentManager as $cm): ?>
                    <?php if (isset($cm['dept_name'], $cm['manager_first_name'], $cm['manager_last_name'], $cm['employee_count'])): ?>
                        <tr>
                            <td>
                                <a href="employes.php?dept_name=<?= urlencode($cm['dept_name']) ?>">
                                    <?= htmlspecialchars($cm['dept_name']) ?>
                                </a>
                            </td>
                            <td><?= htmlspecialchars($cm['manager_first_name'] . ' ' . $cm['manager_last_name']) ?></td>
                            <td><?= htmlspecialchars($cm['employee_count']) ?></td>
                        </tr>
                    <?php else: ?>
                        <!-- ligne mal formée, ignorée ou message de debug -->
                        <tr>
                            <td colspan="3" style="color:red;">Ligne invalide</td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>


        </table>
    </div>
</body>

</html>