<?php

session_start();

require("../../Config/commandes.php");

if (!isset($_SESSION['xhTohTuzPbbsTtr71'])) {
    header("Location: ../../login.php");
}

if (empty($_SESSION['xhTohTuzPbbsTtr71'])) {
    header("Location: ../../login.php");
}


$Produits = afficher();

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Supprimer</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src='main.js'></script>
    <link rel="stylesheet" href="../styles.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet">


    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">MonoShop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Nouveau</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="supprimer.php" style="font-weight: bold">Suppression</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="afficher.php">Produits</a>
                    </li>


                </ul>
                <div style="display: flex; justify-content: flex-end ; ">
                    <a href="deconnexion.php" class="btn btn-danger">Se deconnecter</a>
                </div>

            </div>
        </div>
    </nav>

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                <form method="post">
                    <div class="mb-3">

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Identifiant du produit</label>

                            <input type="number" class="form-control" name="idproduit" required>
                        </div>

                        <button type="submit" name="valider" class="btn btn-warning">Supprimer le produit</button>
                </form>

            </div>
            <!-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum, amet libero nostrum reiciendis necessitatibus quos iusto eveniet eaque perspiciatis saepe eum quo, culpa voluptatibus, obcaecati debitis ducimus suscipit ratione tenetur. -->

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                <?php foreach ($Produits as $produit): ?>
                    <div class="col">
                        <div class="card shadow-sm">

                            <img src="<?= $produit->image ?>">

                            <h3>
                                <?= $produit->id ?>
                            </h3>

                            <div class="card-body">

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>

<?php

if (isset($_POST['valider'])) {
    if (isset($_POST['idproduit'])) {
        if (!empty($_POST['idproduit']) and is_numeric($_POST['idproduit'])) {
            $idproduit = htmlspecialchars(strip_tags($_POST['idproduit']));

            try {
                supprimer($idproduit);

            } catch (Exception $e) {
                $e->getMessage();
            }
        }
    }
}

?>