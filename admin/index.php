<!DOCTYPE html>
<html lang="en">
<head>
    <title>Burger Code</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Holtwood+One+SC&display=swap">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h1 class="text-logo">
        <span class="fas fa-utensils "></span> Burger Code <span class=" fas fa-utensils"></span>
    </h1>
    <div class="container admin">
        <div class="row">
            <h1><strong>Liste des items  </strong><a href="insert.php" class="btn btn-success btn-lg"><span class="fa-solid fa-plus"></span>  Ajouter</a></h1>
        </div>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Catégorie</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require 'database.php';
                $db = Database::connect();
                $statement = $db->query('SELECT items.id, items.name,items.description,items.price,categories.name AS category
                FROM items LEFT JOIN categories ON items.category = categories.id
                ORDER BY items.id DESC');
                while($item = $statement->fetch()){
                    echo '<tr>';
                    echo '<td>' .$item['name']. '</td>';
                    echo '<td>' .$item['description']. '</td>';
                    echo '<td>' . number_format((float)$item['price'],2,'.',''). '</td>';
                    echo '<td>' .$item['category']. '</td>';
                    echo '<td width="350">';
                         echo '<a href="view.php?id='.$item['id'].'"class="btn btn-default"><span class="fa-solid fa-eye"></span> Voir</a>';
                         echo ' ';
                         echo '<a href="update.php?id='.$item['id'].'"class="btn btn-primary"><span class="fa-solid fa-pencil"></span> Modifier</a>';
                         echo ' ';
                         echo '<a href="delete.php?id='.$item['id'].'"class="btn btn-danger"><span class="fa-solid fa-remove"></span> Supprimer</a>';
                    echo '</td>';
                    echo '</tr>' ;      
                }
                Database::disconnect();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
