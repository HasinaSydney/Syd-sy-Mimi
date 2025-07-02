<?php
include('../inc/function.php');

if (isset($_GET['dept_name'])) {
    $deptName = $_GET['dept_name'];
    $employes = getEmployes($deptName);
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
    a{
        text-decoration: none;
        color: white;
    }
</style>

<body>
   
    <div class="container mt-5 col-12 col-lg-12">
        <h3>
            <center>Employés du département <?php echo htmlspecialchars($deptName); ?></center>
        </h3>
        <table class="table table-dark table-striped-columns">
            <thead>
                <thead>
                    <!-- <th>Numéro</th> -->
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Sexe</th>
                </thead>
            </thead>
            <tbody>
                <?php foreach ($employes as $emp) { ?>
                <tbody>
                    <td><a href="fiche.php?emp_name=<?php echo $emp['last_name'];?>"><?php echo $emp['last_name']; ?></a></td>
                    <!-- <td><?php echo $emp['last_name']; ?></td> -->
                    <td><?php echo $emp['first_name']; ?></td>
                    <td><?php echo $emp['gender']; ?></td>
                </tbody>
            <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>