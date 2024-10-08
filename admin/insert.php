<?php
    require "database.php";

    $nameError=$descriptionError=$priceError=$categoryError=$imageError=$name=$description=$price=$category=$image="";

    if(!empty($_POST)){
        
        $name                 = checkInput($_POST['name']);
        $description          = checkInput($_POST['description']);
        $price                = checkInput($_POST['price']);
        $category             = checkInput($_POST['category']);
        $image                = checkInput($_FILES['image']['name']);
        $imagePath            = '../images/' . basename($image);
        $imageExtension       = pathinfo($imagePath, PATHINFO_EXTENSION);
        $isSuccess            = true;
        $isUploadSuccess      = false;

        if(empty($name)){
            $nameError = "Ce champ ne peut pas etre vide";
            $isSuccess = false;
        }
        if(empty($description)){
            $descriptionError = "Ce champ ne peut pas etre vide";
            $isSuccess = false;
        }
        if(empty($price)){
            $priceError = "Ce champ ne peut pas etre vide";
            $isSuccess = false;
        }
        if(empty($category)){
            $categoryError = "Ce champ ne peut pas etre vide";
            $isSuccess = false;
        }
        if(empty($image)){
            $imageError = "Ce champ ne peut pas etre vide";
            $isSuccess = false;
        }
        else{
            $isUploadSuccess = true;

            if($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jepg" && $imageExtension != "gif"){
                $imageError = "Les fichiers autoriser sont: .jpg, .jpeg, .png, .gif";
                $isUploadSuccess = false;
            }
            if(file_exists($imagePath)){
                $imageError = "Le fichier existe déja";
                $isUploadSuccess= false;
            }
            if($_FILES["image"]["size"] > 500000){
                $imageError= "Les fichiers ne doit pas dépasser les 500kB";
                $isUploadSuccess = false;
            }
            if($isUploadSuccess){
                if(!move_uploaded_file($_FILES["image"]["tmp_name"],$imagePath)){
                    $imageError = "Il y a eu une erreur lors  de l'upload";
                    $isUploadSuccess = false;
                }
            }
        }
        if($isSuccess && $isUploadSuccess){
            $db = Database::connect();
            $statement = $db->prepare("INSERT INTO items (name,description,price,category,image) values(?, ?, ?, ?, ?)");
            $statement->execute(array($name,$description,$price,$category,$image));
            Database::disconnect();
            header("Location: index.php");

        }

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
            <h1><strong>Ajouter un item </strong></h1>
            <br>
            <form class ="form" role="form" action="insert.php" method ="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Nom:</label>
                    <input type="text" class="form-control" id ="name" name="name" placeholder="Nom" value="<?php echo $name; ?>"> 
                    <span class="help-inline"><?php echo $nameError; ?></span>
                </div>
                <br>
                <div class="form-group">
                <label for="Description">Description:</label>
                    <input type="text" class="form-control" id ="description" name="description" placeholder="description" value="<?php echo $description; ?>"> 
                    <span class="help-inline"><?php echo $descriptionError; ?></span>
                </div>
                <br>
                <div class="form-group">
                <label for="price">Prix: (en €)</label>
                    <input type="number" step="0.01" class="form-control" id ="price" name="price" placeholder="Prix" value="<?php echo $price; ?>"> 
                    <span class="help-inline"><?php echo $priceError;?></span>
                </div>
                <br>
                <div class="form-group">
                <label for="category">Catégorie:</label>
                   <select class="form-control" name="category" id="category" >
                        <?php 
                            $db= Database::connect();
                            foreach($db->query('SELECT * FROM categories') as $row){
                                echo '<option value="'. $row['id'] . '">' . $row['name'] .'</option>';
                            }
                            Database::disconnect();
                        ?>
                   </select>
                    <span class="help-inline"><?php echo $categoryError;?></span>
                </div>
                <br>
                <div class="form-group">
                    <label for="image">Sélectionner une image:</label>
                    <input type="file" id="image"  name="image">
                    <br>
                    <span class="help-inline"><?php echo $imageError;?></span>
                </div>
                <br>
            
                <div class="form-actions">
                    <button type="submit" class="btn btn-success"><span class="fa-solid fa-pencil"></span> Ajouter</button>
                    <a href="index.php" class="btn btn-primary"><span class="fa-solid fa-arrow-left"></span> Retour</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
