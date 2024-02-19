<?php
include 'commandes.php';

session_start();

$Produits = afficher();

if (isset($_SESSION['hJHVHjhshdYjhf10']) && is_array($_SESSION['hJHVHjhshdYjhf10'])) {
    foreach ($_SESSION['hJHVHjhshdYjhf10'] as $y) {
        $nom = $y->nom;
        $email = $y->email;
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $Produits = afficherDetailsProduit($id);

    if ($Produits) : ?>
        <!DOCTYPE html>
        <html>

        <head>
            <title>Détails du produit</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <style>
                /* Brand identity and color palette */
                :root {
                    --primary: #007bff;
                    --secondary: #868e96;
                    --light: #f8f9fa;
                    /* ...other colors */
                }

                /* Typography */
                body {
                    font-family: sans-serif;
                }

                h1,
                h2,
                h3 {
                    font-weight: bold;
                }

                p {
                    font-size: 16px;
                }

                /* Product details styling */
                .product-details {
                    background-color: var(--light);
                }

                .product-image img {
                    width: 100%;
                    border-radius: 5px;
                    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                }

                .product-info {
                    padding: 20px;
                }

                /* Call to action buttons */
                .btn-primary {
                    background-color: var(--primary);
                    border-color: var(--primary);

                    hover {
                        background-color: darken(var(--primary), 5%);
                    }
                }

                .btn-outline-primary {
                    border-color: var(--primary);

                    hover {
                        background-color: var(--primary);
                        color: white;
                    }
                }

                /* Footer */
                footer {
                    background-color: var(--light);
                    color: var(--secondary);
                }

                /* Responsiveness (using media queries) */
                @media (max-width: 768px) {

                    /* Adjust layout for smaller screens */
                    .product-details .row {
                        flex-direction: column;
                    }

                    .product-image img {
                        width: 80%;
                    }
                }
            </style>
        </head>

        <body>
            <header>
            <nav class="navbar navbar-expand-md navbar-dark bg-dark" fixed>
  <div class="container">
    <a class="navbar-brand" href="index.php">
      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24">
        <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z" />
        <circle cx="12" cy="13" r="4" />
      </svg>
      <strong style="color: #fff;">MasterClass</strong> </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="../index.php" style="font-size: 17px;">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../contact.php" style="font-size: 17px;">A propos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" style="font-size: 17px;">Panier</a>
        </li>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Rechercher un produit" aria-label="Search">
          <button class="btn btn-outline-primary" type="submit">Rechercher</button>
        </form>
        <?php if (isset($nom)) : ?>
          <li class="nav-item dropdown" style="margin-left: 20px;">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #fff; font-size: 18px;">
              <?= $nom ?><i style="font-size: 14px;"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="deconnexion.php">Déconnexion</a></li>
            </ul>
          </li>
        <?php else : ?>
          <li class="nav-item" style="margin-left: 20px;">
            <a class="nav-link" href="login_users.php" style="color: #fff; font-size: 17px;">LogIn</a>
          </li>
        <?php endif; ?>

      </ul>
    </div>
  </div>
</nav>
            </header>
            </header>
            <main class="product-details container my-5">
                <div class="row">
                    <div class="col-md-6 product-image">
                        <img src="../admin/MyDashboard/<?= $Produits->image ?>" alt="<?= $Produits->nom ?>">
                    </div>
                    <div class="col-md-6 product-info">
                        <h1><?= $Produits->nom ?></h1>
                        <p><?= $Produits->description ?></p>
                        <p class="text-muted">Prix : <?= $Produits->prix ?>$</p>
                        <button type="button" class="btn btn-primary">Add to Cart</button>
                        <a href="../index.php" class="btn btn-outline-primary">Retour</a>
                    </div>
                </div>
            </main>

            <footer>
                <?php require_once(__DIR__ . '/../footer.php'); ?>
            </footer>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        </body>

        </html>
    <?php else : ?>
        <p>Le produit demandé n'existe pas.</p>
<?php endif;
} else {
    echo "L'identifiant du produit n'est pas spécifié.";
}
?>