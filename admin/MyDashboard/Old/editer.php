<?php
require("../../Config/commandes.php"); // Accéder aux fonctions
session_start();


// Pour sécuriser la page
if (!isset($_SESSION['xhTohTuzPbbsTtr71'])) {
    header("Location: ../../login.php");
}
if (empty($_SESSION['xhTohTuzPbbsTtr71'])) {
    header("Location: ../../login.php");
}
if (!isset($_GET['ptd'])) {
    header("Location: afficher.php");
}
if (empty($_GET['ptd']) && !is_numeric($_GET['ptd'])) {
    header("Location: afficher.php");
}

// 
$id = $_GET['ptd'];
$produits = getProduit($id);


foreach ($produits as $produit) {
    $nom = $produit->nom;
    $idPtd = $produit->id;
    $image = $produit->image;
    $prix = $produit->prix;
    $description = $produit->description;
}

if (isset($_POST['valider'])) {
    if (isset($_POST['image']) && (isset($_POST['nom'])) && (isset($_POST['prix'])) && (isset($_POST['desc']))) {
        if (!empty($_POST['image']) && (!empty($_POST['nom'])) && (!empty($_POST['prix'])) && (!empty($_POST['desc']))) {
            $image = htmlspecialchars(strip_tags($_POST['image']));
            $nom = htmlspecialchars(strip_tags($_POST['nom']));
            $prix = htmlspecialchars(strip_tags($_POST['prix']));
            $desc = htmlspecialchars(strip_tags($_POST['desc']));

            modifier($image, $nom, $prix, $desc, $id);
            header('Location: afficher.php');

        }
    }
    // if (headers_sent()) {
    //     die("Redirect failed. Please click on this link: <a href=...>");
    // }
    // else{
    //     exit(header("Location: afficher.php"));
    // }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Ajouter les produits</title>

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
                        <a class="nav-link" aria-current="page" href="add.php">Nouveau</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="supprimer.php">Suppression</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="afficher.php">Produits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="editer.php" style="font-weight: bold;">Modification</a>
                    </li>
                </ul>
                <a href="deconnexion.php" class="btn btn-danger">Se deconnecter</a>

            </div>

        </div>
        </div>
    </nav>




    <div class="container">
        <h3><small class="text-muted display-5">Modifier votre produit</small></h3>
    </div>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                <form method="post">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="col-md-2 col-form-label">Titre de l'image</label>

                        <input type="name" class="form-control" name="image" value="<?= $image ?>" required>

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="col-md-2 col-form-label">Nom du produits</label>

                        <input type="text" class="form-control" name="nom" value="<?= $nom ?>" required>

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="col-md-2 col-form-label">Prix</label>

                        <input type="number" class="form-control" name="prix" value="<?= $prix ?>" required>

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Description</label>
                        <textarea class="form-control" name="desc" required><?= $produit->description ?></textarea>
                    </div>
                    <div>
                        <button type="submit" name="valider" class="btn btn-success">Enregistrer</button>
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
// if (isset($_POST['valider'])) {
//     if (isset($_POST['image']) && (isset($_POST['nom'])) && (isset($_POST['prix'])) && (isset($_POST['desc']))) {
//         if (!empty($_POST['image']) && (!empty($_POST['nom'])) && (!empty($_POST['prix'])) && (!empty($_POST['desc']))) {
//             $image = htmlspecialchars(strip_tags($_POST['image']));
//             $nom = htmlspecialchars(strip_tags($_POST['nom']));
//             $prix = htmlspecialchars(strip_tags($_POST['prix']));
//             $desc = htmlspecialchars(strip_tags($_POST['desc']));

//             modifier($image, $nom, $prix, $desc, $id);
//             header('Location: afficher.php');

//         }
//     }
//     // if (headers_sent()) {
//     //     die("Redirect failed. Please click on this link: <a href=...>");
//     // }
//     // else{
//     //     exit(header("Location: afficher.php"));
//     // }
// }
?>