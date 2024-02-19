<?php

require("../../Config/commandes.php");

session_start();

if (!isset($_SESSION['xhTohTuzPbbsTtr71'])) {
  header("Location: ../../login.php");
}

if (empty($_SESSION['xhTohTuzPbbsTtr71'])) {
  header("Location: ../../login.php");
}

?>

<!-- $_SESSION['xhTohTuzPbbsTtr71'] -->

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Ajouter les produits</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">

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
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="add.php" style="font-weight: bold">Nouveau</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="supprimer.php">Suppression</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="afficher.php">Produits</a>
          </li>
        </ul>
        <a href="deconnexion.php" class="btn btn-danger">Se deconnecter</a>
      </div>
    </div>
  </nav>

  <div class="container">
    <h3><small class="text-muted display-5">Ajouter votre nouveau produit</small></h3>
  </div>

  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <form method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="image" class="col-md-2 col-form-label">Image du produit</label>
            <input type="file" class="form-control" name="image" accept="image/*">
            <small class="text-muted">OU Coller le lien de l'image ci-dessous</small>
            <input type="url" class="form-control" name="image_link">
          </div>

          <div class="mb-3">
            <label for="exampleInputPassword1" class="col-md-2 col-form-label">Nom du produits</label>
            <input type="text" class="form-control" name="nom" required>
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>

<?php

if (isset($_POST['valider'])) {
  if (isset($_POST['nom']) && isset($_POST['prix']) && isset($_POST['desc'])) {
    $nom = htmlspecialchars(strip_tags($_POST['nom']));
    $prix = htmlspecialchars(strip_tags($_POST['prix']));
    $desc = htmlspecialchars(strip_tags($_POST['desc']));

    if (!empty($_FILES['image']['tmp_name']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
      // L'utilisateur a téléchargé une image
      $uploadDir = dirname(__FILE__) . '/../../admin/images/';
      $uploadFile = $uploadDir . basename($_FILES['image']['name']);
      
      if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
        $image = $uploadFile;
        echo "Le fichier a été téléchargé avec succès.";
      } else {
        echo "Erreur lors du déplacement du fichier téléchargé.";
        error_log("Erreur lors du déplacement du fichier téléchargé. Chemin du fichier : " . $uploadFile);
        exit();
      }
    } elseif (!empty($_POST['image_link'])) {
      // L'utilisateur a collé un lien
      $image = htmlspecialchars(strip_tags($_POST['image_link']));
    } else {
      // Ni fichier ni lien n'ont été fournis
      echo "Veuillez fournir une image ou un lien.";
      exit();
    }

    try {
      ajouter($image, $nom, $prix, $desc);
      header("Location: afficher.php");
      exit();
    } catch (Exception $e) {
      echo "Erreur lors de l'ajout du produit : " . $e->getMessage();
    }
  }
}

?>