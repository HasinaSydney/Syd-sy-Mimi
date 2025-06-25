<?php
include('../inc/function.php');

if (isset($_GET['emp_no'])) {
    $empno = $_GET['emp_no'];
    $infos = getInfoEmployes($empno);
    $titres = getTitle($empno);
    $salaires = getSalary($empno);
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Employés du département</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
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
                </div>
            </div>
        </div>
        <table class="tableau">
            <thead>
                <thead>
                    <th>Poste</th>
                    <th>Période</th>
                </thead>
            </thead>
            <tbody>
                <?php while ($titre = mysqli_fetch_assoc($titres)) { ?>
                <tbody>
                    <td><?php echo $titre['title']; ?></td>
                    <td>De <?php echo $titre['from_date']; ?> à <?php echo $titre['to_date']; ?></td>
                </tbody>
            <?php } ?>
            </tbody>
        </table>
        <br>
        <table class="tableau">
            <thead>
                <thead>
                    <th>Salaire</th>
                    <th>Période</th>
                </thead>
            </thead>
            <tbody>
                <?php while ($salaire = mysqli_fetch_assoc($salaires)) { ?>
                <tbody>
                    <td><?php echo $salaire['salary']; ?></td>
                    <td>De <?php echo $salaire['from_date']; ?> à <?php echo $salaire['to_date']; ?></td>
                </tbody>
            <?php } ?>
            </tbody>
        </table>


    </div>
</body>

</html>