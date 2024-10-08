<?php
    require "database.php";
    if(!empty($_GET['id'])){
        $id = checkInput($_GET['id']);
    }
    if(!empty($_POST)){
        $id = checkInput($_POST['id']);
        $db = Database::connect();
        $statement = $db->prepare("DELETE FROM items WHERE id = ?");
        $statement->execute(array($id));
        Database::disconnect();
        header("Location: index.php");
    }

   


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
            <h1><strong>Supprimer  un item </strong></h1>
            <br>
            <form class ="form" role="form" action="delete.php" method ="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">

                <div class="form-actions">
                <div class="alert alert-warning" role="alert">
                   Etes vous sur de vouloir supprimer ?
                </div>
                    <button type="submit" class="btn btn-warning"> Oui</button>
                    <a href="index.php" class="btn btn-default"> Non</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
