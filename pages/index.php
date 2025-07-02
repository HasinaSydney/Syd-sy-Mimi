<?php
include('../inc/function.php');
$departements = getDepartement();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">: -->
    <title>Liste departements</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<style>
.tableau {
    margin: 0 auto;
    border-collapse: collapse;
    text-align: left;
    width: 80%;
    background-color: #212529; /* Couleur sombre Bootstrap */
    color: #fff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
}

.tableau thead th {
    font-weight: bold;
    text-align: left;
    border-bottom: 2px solid #0d6efd; /* Bleu Bootstrap */
    background-color: #343a40;
    padding: 12px 16px;
    font-size: 1.1em;
}

.tableau tbody td {
    border-bottom: 1px solid #444;
    padding: 10px 16px;
    vertical-align: middle;
}



.tableau tbody tr:hover {
    background-color: #495057;
    transition: background 0.2s;
}

a {
    text-decoration: none;
    color: #dab7b0;
    font-weight: 500;
    transition: color 0.2s;
}
a:hover {
    color: #66b3ff;
    text-decoration: underline;
}
header.d-flex {
    align-items: center;
    /* background: linear-gradient(90deg, #343a40 60%, #0d6efd 100%); */
    color: #fff;
    padding: 24px 40px 18px 40px;
    border-radius: 10px;
    margin-bottom: 32px;
    box-shadow: 0 4px 16px rgba(13,110,253,0.08);
}

header.d-flex h1 {
    margin: 0;
    font-size: 2.2rem;
    font-weight: 700;
    letter-spacing: 1px;
     color:#29c1e7;
    text-shadow: 1px 1px 4px #0d6efd33;
}

header.d-flex a.btn {
    font-size: 1.1rem;
    font-weight: 500;
    padding: 10px 28px;
    border-radius: 6px;
    box-shadow: 0 2px 8px rgba(13,110,253,0.10);
    /* transition: background 0.2s, color 0.2s; */
}

header.d-flex a.btn:hover {
    background: #fff;
    color: #0d6efd;
    border: 1px solid #0d6efd;
    text-decoration: none;
}

</style>
<header class="d-flex justify-content-between mt-3">
    <h1>Liste departement</h1>
     <a class="btn btn-primary" href="recherche.php">Recherche</a>  
</header>
<body>

    <div class="container mt-5">
        <table class="tableau">
            <thead class="table-dark">
                <thead>
                   
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
                        <td><a href="employes.php?dept_name=<?php echo $nom_dept; ?>"><?php echo $nom_dept; ?></a></td>
                        <!-- <td><?php echo $nom_dept; ?></td> -->
                        <td><?php echo $currentManager['first_name']; ?></td>
                    </tbody>

                <?php } ?>

            </tbody>
        </table>
    </div>
  
</body>

</html>