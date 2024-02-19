<?php

require("Config/commandes.php");

session_start();

$Produits = afficher();

$nom = null; // Initialisez $nom à null par défaut

if (isset($_SESSION['hJHVHjhshdYjhf10']) && is_array($_SESSION['hJHVHjhshdYjhf10'])) {
  foreach ($_SESSION['hJHVHjhshdYjhf10'] as $y) {
    $nom = $y->nom;
    $email = $y->email;
  }
}
?>


<!doctype html>
<html lang="fr">

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Boot</title>


  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
  <script src='main.js'></script>

  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }

    .product-card {
      height: 250px;
      padding-top: 10px;
      display: grid;
      grid-template-rows: auto auto 1fr;
      padding: 20px;
      margin: 10px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      transition: transform 0.2s ease-in-out;
    }

    .product-card img {
      object-fit: cover;
      border-radius: 5px;
      transition: transform 0.2s ease-in-out;
    }

    .product-card img:hover {
      transform: scale(1.1);
    }

    .product-card h4 {
      margin-top: 0;
      margin-bottom: 10px;
      font-weight: bold;
    }

    .product-card .card-body {
      display: flex;
      justify-content: between;
      align-items: center;
    }

    .product-card .btn {
      border-radius: 30px;
      padding: 10px 20px;
      font-weight: bold;
      transition: background-color 0.2s ease-in-out;
    }

    .product-card .btn-primary {
      background-color: #007bff;
    }

    .product-card .btn:hover {
      background-color: #0062cc;
    }

    .hero-banner {
      height: 400px;
      background-image: url("images/istockphoto.jpg");
      background-size: cover;
      background-position: top;
      display: flex;
      justify-content: center;
      align-items: center
    }

    .hero-banner .banner-content {
      color: white;
      text-align: center;
      padding: 20px;
    }

    .hero-banner h1 {
      font-size: 3em;
      margin-bottom: 20px;
    }

    .hero-banner .btn {
      background-color: #ffffff;
      color: #007bff;
      border: 1px solid #ffffff;
      padding: 10px 20px;
      font-weight: bold;
      transition: background-color 0.2s ease-in-out;
    }

    .hero-banner .btn:hover {
      background-color: #007bff;
      color: #ffffff;
    }

    .product-filter {
      margin-bottom: 20px;
    }

    .product-filter select {
      padding: 8px 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 16px;
    }

    .testimonials {
      background-color: #f5f5f5;
      padding: 20px;
    }

    .testimonial {
      border-bottom: 1px solid #ddd;
      padding: 20px;
    }

    .testimonial img {
      float: left;
      margin-right: 20px;
      border-radius: 50%;
    }

    .testimonial p {
      font-size: 16px;
      margin-bottom: 0;
    }

    .testimonial span {
      font-size: 14px;
      color: #ccc;
    }

    .footer {
      background-color: #343a40;
      color: white;
      padding: 20px;
    }

    .product-card .card-body .d-flex {
      justify-content: space-between;
    }
  </style>

</head>

<body>
  <header>
    <?php require_once(__DIR__ . '/navbar.php'); ?>
  </header>


  <main>
    <div class="hero-banner">
      <div class="banner-content">
        <h1>Produits de qualité supérieure</h1>
        <p>Découvrez notre large gamme de produits abordables et stylés.</p>
        <a href="#voir" class="btn">Voir plus</a>
      </div>
    </div>

    <div class="product-filter">
      <select name="category">
        <option value="">Toutes les catégories</option>
        <option value="1">Mode</option>
        <option value="2">Technologie</option>
        <option value="3">Maison</option>
      </select>
    </div>

    <div class="album py-5 bg-light overflow-auto ">
      <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 overflow-auto" id="voir">

          <?php foreach ($Produits as $produit) : ?>
            <div class="col">
              <div class="product-card d-flex flex-column">
                <h5>
                  <?= $produit->nom ?>
                </h5>
                <img src="admin/MyDashboard/<?= $produit->image ?>" style="max-width: 50%; overflow: scroll;">

                <div class="card-body">

                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-primary">Acheter</button>
                      <a href="Config/detail.php?id=<?= $produit->id ?>" class="btn btn-sm btn-outline-primary">Voir</a>
                    </div>
                    <span class="text-muted" style="padding-left: 20px;">
                      <span class="math-inline"><?= $produit->prix ?>$</span>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <div class="testimonials">
      <h2>Témoignages clients</h2>
      <div class="testimonial">
        <img src="images/woman2.jpg" alt="Client photo" style="width: 100px; height: 100px;">
        <p>"Excellent produit et service client irréprochable. Je recommande vivement !"</p>
        <span>- Sophie Dupont</span>
      </div>
      <div class="testimonial">
        <img src="images/woman.jpg" alt="Client photo" style="width: 100px; height: 100px;">
        <p>"Livraison rapide et produit conforme à la description. Je suis très satisfait."</p>
        <span>- Pierre Martin</span>
      </div>
    </div>

  </main>

  <?php require_once(__DIR__ . '/footer.php'); ?>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>