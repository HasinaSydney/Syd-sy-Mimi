<?php
include('../inc/function.php');
$departements = getDepartement();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Liste departements</title>
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

    a {
        text-decoration: none;
    } 

</style>

<body>

    <div class="container mt-5">
        <table class="tableau">
            <thead class="table-dark">
                <thead>
                    <th scope="col">Numero departement</th>
                    <th scope="col">Nom departement</th>
                    <th scope="col">Informations Manager</th>
                </thead>
            </thead>

            <tbody>
                <?php
                while ($dept = mysqli_fetch_assoc($departements)) {
                    $numero_dept = $dept['dept_no'];
                    $nom_dept = $dept['dept_name'];
                    $currentManager = getCurrentManager($numero_dept);
                    ?>
                    <tbody>
                        <td><a href="employes.php?dept_no=<?php echo $numero_dept; ?>"><?php echo $numero_dept; ?></a></td>
                        <td><?php echo $nom_dept; ?></td>
                        <td><?php echo $currentManager['first_name']; ?></td>
                    </tbody>

                <?php } ?>

            </tbody>
        </table>
    </div>
   <p><a class="link-offset-2 link-underline link-underline-opacity-0" href="recherche.php">Recherche</a></p>
</body>

</html>