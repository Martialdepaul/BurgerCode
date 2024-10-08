<!DOCTYPE html>
<html lang="en">
<head>
    <title>Burger Code</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Holtwood+One+SC&display=swap">
    <link rel="stylesheet" href="style.css">
    <script>
                    $(document).ready(function(){
            $(".nav-item").on("click", ".nav-link", function(){
                $(".nav-item .nav-link").removeClass("active");
                $(this).addClass("active");
            });
        });           
    </script>
</head>
<body>
    <div class="container Site">
        <h1 class="text-logo">
            <span class="fas fa-utensils "></span> Burger Code <span class=" fas fa-utensils"></span>
        </h1>
        <?php
                require 'admin/database.php';
                echo '<ul class="nav nav-pills">
                        ';
                $db = Database::connect();
                $statement = $db->query('SELECT * FROM categories');
                $categories = $statement->fetchAll();
                foreach($categories as $category){
                    if($category['id'] == '1'){
                        echo '<li class="nav-item"><a class="nav-link active" aria-current="page"  data-bs-toggle="pill" href="#' . $category['id'] . '" role="tab">' . $category['name'] . '</a></li>';
                    }
                    else{
                        echo '<li class="nav-item"><a class="nav-link" aria-current="page"  data-bs-toggle="pill" href="#' . $category['id'] . '" role="tab">' . $category['name'] . '</a></li>';
                    }
                    
                }
                echo '</ul>';
                echo ' <div class="tab-content">';
                
                foreach($categories as $category){
                    if($category['id'] == '1'){
                        echo '<div class="tab-pane active"  id="'. $category['id'] .'" role="tabpanel">';
                    }
                    else{
                        echo '<div class="tab-pane"  id="'. $category['id'] .'" role="tabpanel">';
                    }
                    echo '<div class="row">';

                    $statement = $statement = $db->prepare('SELECT * FROM items WHERE items.category = ?');
                    $statement->execute(array($category['id']));

                    while($item = $statement->fetch()){
                        echo ' <div class="col-sm-6 col-md-4">
                        <div class="card">
                            <img src="images/'. $item['image'] .'" alt="...">
                            <div class="price">' . number_format($item['price'],2,'.','') .'€</div>
                            <div class="card-body">
                                <h4 class="card-title">' . $item['name'] .'</h4>
                                <p class="card-text">' . $item['description'] .'</p>
                                <a href="#" class="btn btn-order" role="button"><span class="fas fa-shopping-cart"></span>Commander</a>
                            </div>
                        </div>
                    </div>';
                    }
                    echo '</div>
                            </div>';
                }
                Database::disconnect();
                echo '</div>';
        ?>   
    </div>
</body>
</html>