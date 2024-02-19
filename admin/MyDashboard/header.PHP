<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="../../index.php">MonoShop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                    <a class="nav-link active" href="afficher.php" style="font-weight: bold">Produits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><?= $nom ?></a>
                </li>
            </ul>
            <div style="display: flex; justify-content: flex-end ; ">
                <a href="deconnexion.php" class="btn btn-danger">Se deconnecter</a>
            </div>

        </div>
    </div>
</nav>