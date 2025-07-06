<?php
include('../inc/function.php');

if (isset($_GET['emp_name'])) {
    $empno = $_GET['emp_name'];
    $infos = getInfoEmployes($empno);
    $titres = getTitle($empno);
    $salaires = getSalary($empno);

    $longestJob = getLongestJob($infos['emp_no']);
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Employés du département</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    .tableau {
        margin: 0 auto;
        border-collapse: collapse;
        text-align: left;
    }

    .tableau thead th {
        font-weight: bold;
        text-align: left;
        border-bottom: 1px solid black;

    }

    .tableau tbody td {
        border-bottom: 1px solid #ddd;
    }
</style>

<body>

    <div class="container mt-5 col-12 col-lg-12">
        <h3>
            <center>Informations sur l'employé <?php echo htmlspecialchars($empno); ?> </center>
        </h3>
        <div class="col-12 col-lg-5 mt-5 ml-5 bc-dark">
            <div class="card border-3 shadow">
                <div class="card-body">
                    <p class="card-title fw-bold"><?php echo $infos['emp_no']; ?></p>
                    <p class="card-text">Nom complet : <?php echo $infos['first_name']; ?>
                        <?php echo $infos['last_name']; ?>
                    </p>
                    <p class="card-text">Sexe : <?php echo $infos['gender']; ?></p>
                    <p class="card-text">Departement : <?php echo $infos['dept_name']; ?></p>


                </div>
            </div>
        </div>
        <div class="col-12 col-lg-5 mt-3 ml-5">
            <div class="alert alert-info">
                <strong>Emploi le plus longtemps occupé :</strong> <?= htmlspecialchars($longestJob['title']) ?>
                (<?= $longestJob['duree'] ?> jours)
            </div>
        </div>

        <table class="table table-striped table-bordered mt-4">
            <thead class="table-dark">
                <tr>
                    <th>Poste</th>
                    <th>Salaire</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // On suppose que $titres et $salaires sont synchronisés (même nombre de lignes et même ordre)
                while ($titre = mysqli_fetch_assoc($titres)) {
                    $salaire = mysqli_fetch_assoc($salaires);
                    ?>
                    <tr>
                        <td><?php echo $titre['title']; ?></td>
                        <td>
                            <?php
                            if ($salaire && isset($salaire['salary'])) {
                                echo $salaire['salary'];
                            } else {
                                echo '-';
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($salaire && isset($salaire['from_date']) && isset($salaire['to_date'])) {
                                echo $salaire['from_date'] . ' à ' . $salaire['to_date'];
                            } else {
                                echo '-';
                            }
                            ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <br>
    </div>
</body>

</html>