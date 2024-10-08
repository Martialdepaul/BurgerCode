<?php
    require 'database.php';
    if(!empty($_GET['id'])){
        $id = checkInput($_GET['id']);
    }
    $db = Database::connect();
    $statement = $db->prepare('SELECT items.id, items.name,items.description,items.price,items.image,categories.name AS category
    FROM items LEFT JOIN categories ON items.category = categories.id Where items.id = ?');

    $statement->execute(array($id));
    $item = $statement->fetch();    
    Database::disconnect();

    function checkInput($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

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
            <div class="col-sm-6">
            <h1><strong>Voir un item </strong></h1>
            <br>
            <form>
                <div class="form-group">
                    <label>Nom:</label><?php echo "  ".$item['name'];?> 
                </div>
                <br>
                <div class="form-group">
                    <label>Description:</label><?php echo "  ".$item['description'];?> 
                </div>
                <br>
                <div class="form-group">
                    <label>Prix:</label><?php echo "  ". number_format((float)$item['price'],2,'.','') .' €';?> 
                </div>
                <br>
                <div class="form-group">
                    <label>Catégorie:</label><?php echo "  ".$item['category'];?> 
                </div>
                <br>
                <div class="form-group">
                    <label>Image:</label><?php echo "  ".$item['image'];?> 
                </div>
                <br>
            </form>
            <div class="form-actions">
                <a href="index.php" class="btn btn-primary"><span class="fa-solid fa-arrow-left"></span> Retour</a>
            </div>
        </div>
        
        <div class="col-sm-6 Site">
            <div class="card">
                <img src="<?php echo '../images/' . $item['image'];?>">
                <div class="price"><?php echo  number_format((float)$item['price'],2,'.','');?></div>
                <div class="card-body">
                    <h4 class="card-title"><?php echo $item['name'];?></h4>
                    <p class="card-text"><?php echo $item['description'];?></p>
                    <a href="#" class="btn btn-order" role="button"><span class="fas fa-shopping-cart"></span>Commander</a>
                </div>
            </div>
         </div>
    </div>
</body>
</html>
