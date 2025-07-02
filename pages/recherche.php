
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>

    <title>Recherche</title>
</head>
<body>
    <h1>Recherche</h1>
    <form action="traitement.php" method="get" class="container mt-5">
        <div class="mb-3">
            <label for="recherche" class="form-label">Recherche</label>
            <input type="text" class="form-control" id="departement" name="recherche">
        </div>
         <!-- <div class="mb-3">
            <label for="nom" class="form-label">Nom de l'employé</label>
            <input type="text" class="form-control" id="nom" name="nom">
        </div> -->
        <div class="mb-3">
            <label for="age_min" class="form-label">Âge minimum</label>
            <input type="number" class="form-control" id="age_min" name="age_min" min="0">
        </div>
        <div class="mb-3">
            <label for="age_max" class="form-label">Âge maximum</label>
            <input type="number" class="form-control" id="age_max" name="age_max" min="0">
        </div> 
        <button type="submit" class="btn btn-primary">Rechercher</button>
    </form>