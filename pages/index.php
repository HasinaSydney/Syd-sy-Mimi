<?php
include('../inc/function.php');
$dept = getManager();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    
<div class="container mt-5">
    <table class="table table-striped table-success">
        <thead class="table-dark">
            <tr>
                <th scope="col">Dept_no</th>
                <th scope="col">Manager_name</th>
                <th scope="col">Dept_name</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($dept as $d): 
              
                ?>

            <tr>
                <td><?php echo $d['dept_no']; ?></td>
                <td><?php echo $d['first_name']; ?></td>
                <td><?php echo $d['dept_name']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
  <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>