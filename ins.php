<?php
session_start();

include "Config/commandes.php";

if (isset($_SESSION['xhTohTuzPbbsTtr71'])) {
    if (!empty($_SESSION['xhTohTuzPbbsTtr71'])) {
        header("Location: admin/index.php");
    }
}

if (isset($_POST['envoyer'])) {
    if (!empty($_POST['pseudo']) and !empty($_POST['email']) and !empty($_POST['motdepasse'])) {
        $pseudo = htmlspecialchars(strip_tags($_POST['pseudo']));
        $email = htmlspecialchars(strip_tags($_POST['email']));
        $motdepasse = htmlspecialchars(strip_tags($_POST['motdepasse']));

        $adm = ajouterAdmin($pseudo, $email, $motdepasse);

        if ($adm) {
            header('Location: login.php');
        } else {
            echo "Compte non créer !";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Vendor CSS Files -->
    <link href="admin/MyDashboard/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="admin/MyDashboard/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="admin/MyDashboard/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="admin/MyDashboard/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="admin/MyDashboard/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="admin/MyDashboard/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="admin/MyDashboard/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="admin/MyDashboard/assets/css/style.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Registration - MonoShop</title>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>
    <main>
        <div class="container">
            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                            <div class="d-flex justify-content-center py-4">
                                <div class="logo d-flex align-items-center w-auto">
                                    <span class="d-none d-lg-block">Admin</span>
                                </div>
                            </div>

                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Create an account</h5>
                                    </div>

                                    <form method="post" class="row g-3 needs-validation" novalidate>
                                        <div class="mb-3">
                                            <label for="nom" class="form-label">Your Name</label>
                                            <input type="text" name="pseudo" class="form-control" required>
                                            <div class="invalid-feedback">Please, enter your name!</div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Your Email</label>
                                            <input type="email" name="email" class="form-control" required>
                                            <div class="invalid-feedback">Please, enter a valid email address!</div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="motdepasse" class="form-label">Password</label>
                                            <input type="password" class="form-control" name="motdepasse" required>
                                            <div class="invalid-feedback">Please, enter a password!</div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="submit" name="envoyer" class="btn btn-primary w-100" value="Register">
                                        </div>
                                        <div class="mb-3 text-center">
                                            <p class="small mb-0">Already have an account? <a href="ins.php">Log in</a></p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>

<?php



?>