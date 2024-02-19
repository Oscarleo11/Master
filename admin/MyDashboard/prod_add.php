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

foreach ($_SESSION['xhTohTuzPbbsTtr71'] as $i) {
    $nom = $i->pseudo;
    $email = $i->email;
}

$base_path = 'MyDashboard/';
$image = htmlspecialchars(strip_tags($_POST['image_link']));
echo "URL de l'image : " . $image;


if (isset($_POST['valider'])) {
    if (isset($_POST['nom']) && isset($_POST['prix']) && isset($_POST['desc'])) {
        $nom = htmlspecialchars(strip_tags($_POST['nom']));
        $prix = htmlspecialchars(strip_tags($_POST['prix']));
        $desc = htmlspecialchars(strip_tags($_POST['desc']));

        if (!empty($_FILES['image']['tmp_name']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            // L'utilisateur a téléchargé une image
            $uploadDir = '../../admin/' . $base_path . 'images/';
            $uploadFile = $uploadDir . basename($_FILES['image']['name']);

            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                $image = $uploadFile;
                echo "Le fichier a été téléchargé avec succès.";
            } else {
                echo "Erreur lors du déplacement du fichier téléchargé.";
                echo "Destination: " . $uploadFile;
                echo "Tmp name: " . $_FILES['image']['tmp_name'];
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
            header("Location: index.php");
            exit();
        } catch (Exception $e) {
            echo "Erreur lors de l'ajout du produit : " . $e->getMessage();
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - LeoAdmin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <!-- <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.php" class="logo d-flex align-items-center">
                <img src="assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">LeoAdmin</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->


                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <!-- <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> -->
                        <i class="bi bi-person rounded-circle"></i>
                        <span class="d-none d-md-block dropdown-toggle ps-2"><?= $nom ?></span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6><?= $nom ?></h6>
                            <span>Web Development</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                                <i class="bi bi-plus"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="pages-faq.php">
                                <i class="bi bi-question-circle"></i>
                                <span>Need Help?</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="deconnexion.php">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="index.php">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Components</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="afficher.php">
                            <i class="bi bi-circle"></i><span>Tables des produits</span>
                        </a>
                    </li>
                    <li>
                        <a href="add.php">
                            <i class="bi bi-circle"></i><span>Ajouter des produits</span>
                        </a>
                    </li>
                    <li>
                        <a href="supprimer.php">
                            <i class="bi bi-circle"></i><span>Supprimer des produits</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Components Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="tables-data.php">
                            <i class="bi bi-circle"></i><span>Data Tables</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Tables Nav -->

            <li class="nav-heading">Pages</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="prod_add.php">
                    <i class="bi bi-plus"></i>
                    <span>Add</span>
                </a>
            </li><!-- End Contact Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="users-profile.php">
                    <i class="bi bi-person"></i>
                    <span>Profile</span>
                </a>
            </li><!-- End Profile Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="pages-contact.php">
                    <i class="bi bi-envelope"></i>
                    <span>Contact</span>
                </a>
            </li><!-- End Contact Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="pages-register.php">
                    <i class="bi bi-card-list"></i>
                    <span>Register</span>
                </a>
            </li><!-- End Register Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="pages-login.php  ">
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span>Login</span>
                </a>
            </li><!-- End Login Page Nav -->
        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Add Produits</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item">Pages</li>
                    <li class="breadcrumb-item active">Add</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section contact">
            <div class="row gy-4">
                <div class="col-xl-6">
                    <div class="card p-4">
                        <form method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="image" class="col-md-6 col-form-label">Image du produit</label>
                                <input type="file" class="form-control" name="image" accept="image/*">
                                <!-- <small class="text-muted">OU Coller le lien de l'image ci-dessous</small>
                                <input type="url" class="form-control" name="image_link"> -->
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="col-md-6 col-form-label">Nom du produits</label>
                                <input type="text" class="form-control" name="nom" required>
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="col-md-6 col-form-label">Prix</label>
                                <input type="number" class="form-control" name="prix" required>
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="col-md-6 col-form-label">Description</label>
                                <textarea class="form-control" name="desc" required></textarea>
                            </div>

                            <div>
                                <button type="submit" name="valider" class="btn btn-primary">Ajouter</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>

        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>LeoAdmin</span></strong>. All Rights Reserved
        </div>

    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
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