<?php

require("../../Config/commandes.php");


?>


<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Ajouter</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap"
    rel="stylesheet">
    <script src='main.js'></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>


</head>

<body>

    <div class="container">
        <h3><small class="text-muted display-5">Ajouter votre nouveau produit</small></h3>
    </div>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                <form method="post">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="col-md-2 col-form-label">Lien de l'image</label>

                        <input type="name" class="form-control" name="image" required>

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="col-md-2 col-form-label">Nom du produits</label>

                        <input type="text" class="form-control"  name="nom" required>

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="col-md-2 col-form-label">Prix</label>

                        <input type="number" class="form-control" name="prix" required>

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="col-md-2 col-form-label">Description</label>

                        <textarea class="form-control" name="desc" required></textarea>

                    </div>
                    <div>
                        <button type="submit" name="valider" class="btn btn-primary">Ajouter</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>

<?php

if (isset($_POST['valider'])) {
    if (isset($_POST['image']) && isset($_POST['nom']) && isset($_POST['prix']) && isset($_POST['desc'])) {
        if (!empty($_POST['image']) && !empty($_POST['nom']) && !empty($_POST['prix']) && !empty($_POST['desc'])) {
            $image = htmlspecialchars(strip_tags($_POST['image']));
            $nom = htmlspecialchars(strip_tags($_POST['nom']));
            $prix = htmlspecialchars(strip_tags($_POST['prix']));
            $desc = htmlspecialchars(strip_tags($_POST['desc']));

            try {
                ajouter($image, $nom, $prix, $desc);
                header("Location: afficher.php");
                exit();
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }
}

?>