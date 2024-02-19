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
          <a class="nav-link" href="index.php" style="font-size: 17px;">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php" style="font-size: 17px;">A propos</a>
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